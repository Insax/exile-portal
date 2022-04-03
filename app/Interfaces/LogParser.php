<?php

namespace App\Interfaces;

use App\Models\LogTemplate;
use App\Models\ParsedHumanReadableLog;

interface LogParser {

    /**
     * @return string
     */
    public function getRegex(): string;

    /**
     * @return string
     */
    public function getLogName(): string;

    /**
     * @param array $validated
     * @return $this
     */
    public function createLogEntry(array $validated): self;

    /**
     * @param LogTemplate $template
     * @return ParsedHumanReadableLog
     */
    public function logForHumans(LogTemplate $template): ParsedHumanReadableLog;

    /**
     * @return array
     */
    public function validate(): array;

    /**
     * @param array $matches
     * @return void
     */
    public function mapAttributes(array $matches): void;

    /**
     * @return array
     */
    public function rules(): array;
}
