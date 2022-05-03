<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GameServerLoggingChat
 *
 * @property int $id
 * @property string $sender_id
 * @property string $receiver_id
 * @property string $text
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingChat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingChat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingChat query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingChat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingChat whereReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingChat whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingChat whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingChat whereTime($value)
 * @mixin \Eloquent
 */
class GameServerLoggingChat extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_chat';
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
}
