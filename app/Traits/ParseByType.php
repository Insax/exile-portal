<?php

namespace App\Traits;

use App\Interfaces\LogParser;
use App\Models\InfistarLog;
use App\Models\LogTemplate;
use Illuminate\Database\Eloquent\Collection;

trait ParseByType {

    private LogParser $logParser;
    private Collection $logs;

    /**
     * @param string $logName
     * @return Collection
     */
    public abstract function retrieveData(string $logName): Collection;

    /**
     * @return string
     */
    public abstract function getLogEntryColumn(): string;

    /**
     * @param string $logParser
     * @return $this
     */
    public function attachLogParser(string $logParser): static
    {
        $this->logParser = new $logParser();
        return $this;
    }

    public function parseLog()
    {
        $this->logs = $this->retrieveData($this->logParser->getLogName());
        /** @var InfistarLog $log */
        foreach ($this->logs as $log) {
            $matches = array();
            $regexp = preg_match($this->getRegex(), $log->logentry, $matches);
            if(!$regexp)
                return;

            $this->logParser->mapAttributes($matches);
            $validated = $this->logParser->validate();
            $validated['time'] = $log->time;

            $this->logParser = $this->logParser->createLogEntry($validated);
            $logTemplate = LogTemplate::whereLogName($this->logParser->getLogName())->whereArgumentCount(count($validated))->first();
            $this->logParser->logForHumans($logTemplate);
            $log->update(['parsed' => true]);
        }
    }

    /**
     * @return string
     */
    private function getRegex(): string
    {
        return $this->logParser->getRegex();
    }
}
