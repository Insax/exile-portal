<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingThermalscanner
 *
 * @property int $id
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $object_id
 * @property string $object_type
 * @property string $pin_code
 * @property string $player_pos
 * @property string|null $territory_id
 * @property string|null $has_rights
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingThermalscanner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingThermalscanner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingThermalscanner query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingThermalscanner whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingThermalscanner whereHasRights($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingThermalscanner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingThermalscanner whereObjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingThermalscanner whereObjectType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingThermalscanner wherePinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingThermalscanner wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingThermalscanner wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingThermalscanner whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingThermalscanner whereTime($value)
 * @mixin \Eloquent
 */
class GameServerLoggingThermalscanner extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_thermalscanner';
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
		'object_id',
		'object_type',
		'pin_code',
		'player_pos',
		'territory_id',
		'has_rights',
		'time'
	];
}
