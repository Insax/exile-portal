<?php

namespace App\Models;

use App\Interfaces\LogParser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Validator;
use JetBrains\PhpStorm\ArrayShape;

class BreachingLog extends Model implements LogParser
{
    public $incrementing = true;
    public $timestamps = true;

    protected $connection = 'portal';
    protected $table = 'breaching_logs';
    protected $primaryKey = 'id';

    protected $casts = [
        'id' => 'int',
        'portal_instance_id' => 'int',
        'action' => 'string',
        'clan_id' => 'int',
        'account_uid' => 'string',
        'object_class' => 'string',
        'territory_id' => 'int',
        'position' => 'string',
        'charge_used' => 'string',
        'time' => 'datetime'
    ];

    protected $fillable = [
        'portal_instance_id',
        'action',
        'clan_id',
        'account_uid',
        'object_class',
        'territory_id',
        'position',
        'charge_used',
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
     * @return BelongsTo
     */
    public function clan(): BelongsTo
    {
        return $this->belongsTo(Clan::class);
    }

    /**
     * @return BelongsTo
     */
    public function territory(): BelongsTo
    {
        return $this->belongsTo(Territory::class);
    }

    /**
     * @return string
     */
    public function getRegex(): string
    {
        return '/(\S+)\s(\d+)\s(\d{17})\s(\S+)\s(\d+)\s(\[\S+])\s(\S+)/';
    }

    /**
     * @return string
     */
    public function getLogName(): string
    {
        return 'BREACHING_LOG';
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
        if($this->clan_id) {
            $logEntry = sprintf($template->templateString,
                $this->time,
                url()->route('account.view', ['account' => $this->account_uid]),
                $this->account->name,
                url()->route('clan.view', ['clan' => $this->clan_id]) ?? '#',
                $this->clan ? $this->clan->name : 'NaN',
                $this->action == 'PLANTED' ? 'finished' : 'started',
                $this->charge_used,
                url()->route('territory.view', ['territory' => $this->territory_id]) ?? '#',
                $this->territory ? $this->territory->name : 'NaN',
                $this->object_class,
                $this->position
            );
        } else {
            $logEntry = sprintf($template->templateString,
                $this->time,
                url()->route('account.view', ['account' => $this->account_uid]),
                $this->account->name,
                $this->action == 'PLANTED' ? 'finished' : 'started',
                $this->charge_used,
                url()->route('territory.view', ['territory' => $this->territory_id]) ?? '#',
                $this->territory ? $this->territory->name : 'NaN',
                $this->object_class,
                $this->position
            );
        }

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
            'account_uid' => $matches[3],
            'object_class' => $matches[4],
            'territory_id' => $matches[5],
            'position' => $matches[6],
            'charge_used' => $matches[7]
        ];
        if($matches[2] != -1)
            $this->mappedAttributes['clan_id'] = $matches[2];
    }

    /**
     * @return array
     */
    #[ArrayShape(['portal_instance_id' => "string", 'action' => "string", 'account_uid' => "string", 'object_class' => "string", 'territory_id' => "string", 'position' => "string", 'charge_used' => "string"])]
    public function rules(): array
    {
        return [
            'portal_instance_id' => 'required|exists:portal_instances,id',
            'action' => 'required',
            'account_uid' => 'required|size:17',
            'object_class' => 'required',
            'territory_id' => 'required|integer',
            'position' => 'required|string',
            'charge_used' => 'required|string'
        ];
    }
}
