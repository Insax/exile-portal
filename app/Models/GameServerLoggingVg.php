<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingVg
 *
 * @property int $id
 * @property string $action
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $vehicle_class
 * @property string $vehicle_id
 * @property string $vehicle_pos
 * @property string $nickname
 * @property string $flag_id
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVg newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVg newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVg query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVg whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVg whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVg whereFlagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVg whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVg whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVg wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVg whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVg whereVehicleClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVg whereVehicleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVg whereVehiclePos($value)
 * @mixin \Eloquent
 */
class GameServerLoggingVg extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_vg';
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
		'vehicle_class',
		'vehicle_id',
		'vehicle_pos',
		'nickname',
		'flag_id',
		'time'
	];
}
