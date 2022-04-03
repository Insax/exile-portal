<?php

namespace App\Models;

use App\Interfaces\LogParser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParsedHumanReadableLog extends Model
{
    use HasFactory;

    /**
     * @param int $logId
     * @param string $logType
     * @param $logEntry
     * @return static
     */
    public static function createLogEntry(int $logId, string $logType, $logEntry): static
    {
        return self::create([
            'loggable_id' => $logId,
            'loggable_type' => $logType,
            'log_entry' => $logEntry
        ]);
    }
}
