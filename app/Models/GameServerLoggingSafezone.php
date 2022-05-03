<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingSafezone
 *
 * @property int $id
 * @property string $action
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $vehicle
 * @property string|null $vehicle_id
 * @property string $player_pos
 * @property string $vehicle_pos
 * @property string|null $vehicle_owner
 * @property string|null $vehicle_owner_clan_id
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingSafezone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingSafezone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingSafezone query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingSafezone whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingSafezone whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingSafezone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingSafezone wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingSafezone wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingSafezone whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingSafezone whereVehicle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingSafezone whereVehicleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingSafezone whereVehicleOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingSafezone whereVehicleOwnerClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingSafezone whereVehiclePos($value)
 * @mixin \Eloquent
 */
class GameServerLoggingSafezone extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_safezone';
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
		'vehicle',
		'vehicle_id',
		'player_pos',
		'vehicle_pos',
		'vehicle_owner',
		'vehicle_owner_clan_id',
		'time'
	];
}
