<?php

namespace App\Models;

use App\Interfaces\LogParser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Validator;
use JetBrains\PhpStorm\ArrayShape;

class ChatLog extends Model implements LogParser
{
    public $incrementing = false;
    public $timestamps = false;

    protected $connection = 'portal';
    protected $table = 'chat_logs';
    protected $primaryKey = 'id';

    protected $casts = [
        'id' => 'int',
        'portal_instance_id' => 'int',
        'sender_uid' => 'string',
        'recipient_uid' => 'string',
        'message' => 'string',
        'time' => 'datetime'
    ];

    protected $fillable = [
        'portal_instance_id',
        'sender_uid',
        'recipient_uid',
        'message',
        'time'
    ];

    /**
     * @return BelongsTo
     */
    public function senderAccount(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'sender_uid', 'uid');
    }

    /**
     * @return BelongsTo
     */
    public function recipientAccount(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'recipient_uid', 'uid');
    }

    /**
     * @return string
     */
    public function getRegex(): string
    {
        return '/(\d{17})\s(\d{17})\s(.*)/';
    }

    /**
     * @return string
     */
    public function getLogName(): string
    {
        return 'CHAT';
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
            $this->attributes['test']);

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
            'sender_uid' => $matches[1],
            'recipient_uid' => $matches[2],
            'message' => $matches[3],
        ];
    }

    /**
     * @return array
     */
    #[ArrayShape(['portal_instance_id' => "string", 'sender_uid' => "string", 'recipient_uid' => "string", 'message' => "string"])]
    public function rules(): array
    {
        return [
            'portal_instance_id' => 'required|exists:portal_instances,id',
            'sender_uid' => 'required|size:17',
            'recipient_uid' => 'required|size:17',
            'message' => 'required'
        ];
    }
}
