<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingLocker
 *
 * @property int $id
 * @property string $action
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $amount
 * @property string $locker_before
 * @property string $locker_after
 * @property string $player_before
 * @property string $player_after
 * @property Carbon $time
 *
 * @package App\Models
 */
class GameServerLoggingLocker extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_locker';
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
		'action',
		'player_id',
		'clan_id',
		'amount',
		'locker_before',
		'locker_after',
		'player_before',
		'player_after',
		'time'
	];
}
