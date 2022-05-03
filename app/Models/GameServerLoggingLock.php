<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingLock
 *
 * @property int $id
 * @property string $action
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $object_id
 * @property string $object_type
 * @property string $pin_code
 * @property string $player_pos
 * @property string|null $territory_id
 * @property string|null $build_rights
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLock query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLock whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLock whereBuildRights($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLock whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLock whereObjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLock whereObjectType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLock wherePinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLock wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLock wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLock whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingLock whereTime($value)
 * @mixin \Eloquent
 */
class GameServerLoggingLock extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_lock';
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
		'object_id',
		'object_type',
		'pin_code',
		'player_pos',
		'territory_id',
		'build_rights',
		'time'
	];
}
