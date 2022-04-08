<?php

namespace App\Traits;

use App\Interfaces\LogParser;
use App\Models\InfistarLog;
use App\Models\LogTemplate;
use Illuminate\Database\Eloquent\Collection;
use Log;

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
            if(!$regexp) {
                Log::channel('parser')->debug('Could not parse log:'. $log->logentry);
                $log->update(['parsed' => true]);
                continue;
            }

            $this->logParser->mapAttributes($matches);
            $validated = $this->logParser->validate();
            $validated['time'] = $log->time;

            $this->logParser = $this->logParser->createLogEntry($validated);
            Log::channel('parser')->debug('Argument Count ['. count($validated) .']');
            Log::channel('parser')->debug('Log Name ['. $this->logParser->getLogName() .']');
            $logTemplate = LogTemplate::whereLogName($this->logParser->getLogName())->whereArgumentCount(count($validated))->first();
            $humanReadableLog = $this->logParser->logForHumans($logTemplate);
            if(empty($humanReadableLog->log_entry)) {
                Log::channel('parser')->debug('LogEntry is Empty, Template:'. json_encode($logTemplate). 'Data:'. json_encode($validated));
            }
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
