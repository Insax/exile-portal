<?php

namespace App\Models;

use App\Interfaces\LogParser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParsedHumanReadableLog extends Model
{
    public $incrementing = true;
    public $timestamps = true;

    protected $connection = 'portal';
    protected $table = 'parsed_human_readable_logs';
    protected $primaryKey = 'id';

    protected $casts = [
        'id' => 'int',
        'portal_instance_id' => 'int',
        'loggable_id' => 'int',
        'loggable_type' => 'string',
        'log_entry' => 'string'
    ];

    protected $fillable = [
        'portal_instance_id',
        'loggable_id',
        'loggable_type',
        'log_entry'
    ];
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
