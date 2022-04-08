<?php

namespace App\Models;

use App\Interfaces\LogParser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Validator;
use JetBrains\PhpStorm\ArrayShape;

class BanLog extends Model implements LogParser
{
    public $incrementing = true;
    public $timestamps = true;

    protected $connection = 'portal';
    protected $table = 'ban_logs';
    protected $primaryKey = 'id';

    protected $casts = [
        'id' => 'int',
        'portal_instance_id' => 'int',
        'account_uid' => 'string',
        'banned' => 'boolean',
        'reason' => 'string',
        'time' => 'datetime'
    ];

    protected $fillable = [
        'portal_instance_id',
        'account_uid',
        'banned',
        'reason',
        'time'
    ];

    /**
     * @return BelongsTo
     */
    public function portalInstance(): BelongsTo
    {
        return $this->belongsTo(PortalInstance::class, 'portal_instance_id');
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_uid', 'uid');
    }

    /**
     * @return string
     */
    public function getRegex(): string
    {
        return '/(\d{17})\sbanned\s{2}(\S+),\sreason\s{2}(.*)/';
    }

    /**
     * @return string
     */
    public function getLogName(): string
    {
        return 'BANLOG';
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
            $this->banned
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
            'account_uid' => $matches[1],
            'banned' => $matches[2] == 'true',
            'reason' => $matches[3],
        ];
    }

    /**
     * @return array
     */
    #[ArrayShape(['portal_instance_id' => "string", 'account_uid' => "string", 'banned' => "string", 'reason' => "string"])]
    public function rules(): array
    {
        return [
            'portal_instance_id' => 'required|exists:portal_instances,id',
            'account_uid' => 'required|size:17',
            'banned' => 'required',
            'reason' => 'required'
        ];
    }
}
