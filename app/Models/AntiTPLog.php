<?php

namespace App\Models;

use App\Interfaces\LogParser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Validator;

class AntiTPLog extends Model implements LogParser
{
    public $incrementing = true;
    public $timestamps = true;

    protected $connection = 'portal';
    protected $table = 'anti_t_p_logs';
    protected $primaryKey = 'id';

    protected $casts = [
        'id' => 'int',
        'portal_instance_id' => 'int',
        'action' => 'string',
        'account_uid' => 'string',
        'vehicle_class' => 'string',
        'distance' => 'int',
        'movement_time' => 'float',
        'position_before' => 'string',
        'position_after' => 'string',
        'speed_horizontal' => 'int',
        'speed_vertical' => 'int',
        'tp_count' => 'int',
        'time' => 'datetime'
    ];

    protected $fillable = [
        'portal_instance_id',
        'action',
        'account_uid',
        'vehicle_class',
        'distance',
        'movement_time',
        'position_before',
        'position_after',
        'speed_horizontal',
        'speed_vertical',
        'tp_count',
        'time'
    ];

    /**
     * @return BelongsTo
     */
    public function portalInstance(): BelongsTo
    {
        return $this->belongsTo(PortalInstance::class, 'portal_instance_id');
    }

    /**
     * @return BelongsTo
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_uid', 'uid');
    }

    /**
     * @return string
     */
    public function getRegex(): string
    {
        return '/(\S*)\s(\d{17})\s\|\s(\S+)\s(\d+)\s([+-]?(\d*\.)?\d+)\s(\[\S+])\s(\[\S+])\s(\d+)\/(\d+)\s(\d)/';
    }

    /**
     * @return string
     */
    public function getLogName(): string
    {
        return 'ANTI_TP';
    }

    /**
     * @param array $validated
     * @return $this
     */
    public function createLogEntry(array $validated): LogParser
    {
        return $this->create($validated);
    }

    /**
     * @param LogTemplate $template
     * @return ParsedHumanReadableLog
     */
    public function logForHumans(LogTemplate $template): ParsedHumanReadableLog
    {
        $logEntry = sprintf($template->templateString,
            $this->time,
            url()->route('account.view', ['account' => $this->account_uid]),
            $this->account->name,
            $this->distance,
            $this->movement_time,
            $this->position_before,
            $this->position_after,
            $this->speed_horizontal,
            $this->speed_vertical,
            $this->tp_count
        );

        return ParsedHumanReadableLog::createLogEntry($this->portal_instance_id, $this->id, self::class, $logEntry);
    }

    /**
     * @return array
     */
    public function validate(): array
    {
        $validator = Validator::make($this->mappedAttributes, $this->rules());
        return $validator->validate();
    }

    /**
     * @param array $matches
     * @return void
     */
    public function mapAttributes(array $matches): void
    {
        $this->mappedAttributes = [
            'portal_instance_id' => PortalInstance::getCurrentPortalInstance()->id,
            'action' => $matches[1],
            'account_uid' => $matches[2],
            'vehicle_class' => $matches[3],
            'distance' => $matches[4],
            'movement_time' => $matches[5],
            'position_before' => $matches[7],
            'position_after' => $matches[8],
            'speed_horizontal' => $matches[9],
            'speed_vertical' => $matches[10],
            'tp_count' => $matches[11]
        ];
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'portal_instance_id' => 'required|exists:portal_instances,id',
            'action' => 'required',
            'account_uid' => 'required|size:17',
            'vehicle_class' => 'required',
            'distance' => 'required|integer',
            'movement_time' => 'required|numeric',
            'position_before' => 'required',
            'position_after' => 'required',
            'speed_horizontal' => 'required|integer',
            'speed_vertical' => 'required|integer',
            'tp_count' => 'required|integer'
        ];
    }
}
