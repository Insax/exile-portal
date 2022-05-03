<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingHotwire
 *
 * @property int $id
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $vehicle_class
 * @property string $vehicle_id
 * @property string|null $territory_id
 * @property string $player_pos
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHotwire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHotwire newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHotwire query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHotwire whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHotwire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHotwire wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHotwire wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHotwire whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHotwire whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHotwire whereVehicleClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHotwire whereVehicleId($value)
 * @mixin \Eloquent
 */
class GameServerLoggingHotwire extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_hotwire';
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
		'vehicle_class',
		'vehicle_id',
		'territory_id',
		'player_pos',
		'time'
	];
}
