<?php

namespace App\Traits;

use App\Interfaces\LogParser;
use App\Models\InfistarLog;

trait ParseModel {

    /**
     * @return string
     */
    public abstract function getLoggerClass(): string;

    /**
     * @return void
     */
    public function parse()
    {
        $log = new InfistarLog();
        $log->attachLogParser($this->getLoggerClass())->parseLog();
    }
}
