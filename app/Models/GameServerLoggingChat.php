<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingChat
 *
 * @property int $id
 * @property string $sender_id
 * @property string $receiver_id
 * @property string $text
 * @property Carbon $time
 *
 * @package App\Models
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

	protected $fillable = [
		'id',
		'sender_id',
		'receiver_id',
		'text',
		'time'
	];
}
