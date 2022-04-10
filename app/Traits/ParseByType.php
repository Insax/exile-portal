<?php

namespace App\Traits;

use App\Interfaces\LogParser;
use App\Models\InfistarLog;
use App\Models\LogTemplate;
use App\Models\ParsedHumanReadableLog;
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
                $log->update(['parsed' => true])->save();
                continue;
            }

            $this->logParser->mapAttributes($matches);
            $validated = $this->logParser->validate();
            $validated['time'] = $log->time;

            $this->logParser = $this->logParser->createLogEntry($validated);
            $this->logForHumans('logs.entries.'.strtolower($this->logParser->getLogName()));
            $log->update(['parsed' => true])->save();
        }
    }

    /**
     * @return string
     */
    private function getRegex(): string
    {
        return $this->logParser->getRegex();
    }

    /**
     * @param string $viewPath
     * @return ParsedHumanReadableLog
     */
    private function logForHumans(string $viewPath): ParsedHumanReadableLog
    {
        $logEntry = view($viewPath, ['log' => $this->logParser])->render();
        return ParsedHumanReadableLog::createLogEntry($this->logParser->portal_instance_id, $this->logParser->id, $this->logParser::class, $logEntry);
    }
}
