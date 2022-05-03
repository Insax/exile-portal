<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingVehicleDestroyed
 *
 * @property int $id
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $player_pos
 * @property string $vehicle_class
 * @property string|null $vehicle_id
 * @property string $vehicle_pos
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVehicleDestroyed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVehicleDestroyed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVehicleDestroyed query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVehicleDestroyed whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVehicleDestroyed whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVehicleDestroyed wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVehicleDestroyed wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVehicleDestroyed whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVehicleDestroyed whereVehicleClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVehicleDestroyed whereVehicleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingVehicleDestroyed whereVehiclePos($value)
 * @mixin \Eloquent
 */
class GameServerLoggingVehicleDestroyed extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_vehicle_destroyed';
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
		'player_id',
		'clan_id',
		'player_pos',
		'vehicle_class',
		'vehicle_id',
		'vehicle_pos',
		'time'
	];
}
