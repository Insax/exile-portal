<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GameServerLoggingTrade
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
 * @property string|null $action
 * @property string|null $class
 * @property string|null $quantity
 * @property string|null $vehicle_id
 * @property string|null $container_content
 * @property string|null $price
 * @property string|null $sell_respect
 * @property string|null $poptabs_after
 * @property string|null $respect_after
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTrade whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTrade whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTrade whereContainerContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTrade wherePoptabsAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTrade wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTrade whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTrade whereRespectAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTrade whereSellRespect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTrade whereVehicleId($value)
 */
class GameServerLoggingTrade extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_trade';
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
