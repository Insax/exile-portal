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
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLocker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLocker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLocker query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLocker whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLocker whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLocker whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLocker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLocker whereLockerAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLocker whereLockerBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLocker wherePlayerAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLocker wherePlayerBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLocker wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLocker whereTime($value)
 * @mixin \Eloquent
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
