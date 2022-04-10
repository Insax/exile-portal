<?php

namespace App\Interfaces;

use App\Models\LogTemplate;
use App\Models\ParsedHumanReadableLog;

/**
 * @property int id
 * @property int portal_instance_id
 * @property int
 */
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
