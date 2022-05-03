<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ChatLog
 *
 * @property int $id
 * @property string $sender_uid
 * @property string $recipient_uid
 * @property string $message
 * @property Carbon $time
 * @property Account $account
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ChatLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatLog whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatLog whereRecipientUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatLog whereSenderUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatLog whereTime($value)
 * @mixin \Eloquent
 */
class ChatLog extends Model
{
	protected $connection = 'portal';
	protected $table = 'chat_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'sender_uid');
	}
}
