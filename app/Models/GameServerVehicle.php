<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vehicle
 *
 * @property int $id
 * @property string $class
 * @property Carbon $spawned_at
 * @property string|null $account_uid
 * @property bool $is_locked
 * @property float $fuel
 * @property float $damage
 * @property string|null $hitpoints
 * @property float $position_x
 * @property float $position_y
 * @property float $position_z
 * @property float $direction_x
 * @property float $direction_y
 * @property float $direction_z
 * @property float $up_x
 * @property float $up_y
 * @property float $up_z
 * @property string|null $cargo_items
 * @property string|null $cargo_magazines
 * @property string|null $cargo_weapons
 * @property string|null $cargo_container
 * @property Carbon $last_updated_at
 * @property string $pin_code
 * @property string|null $deleted_at
 * @property int $money
 * @property string|null $vehicle_texture
 * @property int|null $territory_id
 * @property string $nickname
 * @property string $tuning_data
 * @property string $exile_loading
 * @property string $inventory
 * @property string|null $marxet_id
 * @property GameServerAccount|null $account
 * @package App\Models\Gameserver
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle newQuery()
 * @method static \Illuminate\Database\Query\Builder|GameServerVehicle onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereCargoContainer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereCargoItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereCargoMagazines($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereCargoWeapons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereDamage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereDirectionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereDirectionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereDirectionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereExileLoading($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereFuel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereHitpoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereIsLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereLastUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereMarxetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle wherePinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle wherePositionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle wherePositionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle wherePositionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereSpawnedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereTuningData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereUpX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereUpY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereUpZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerVehicle whereVehicleTexture($value)
 * @method static \Illuminate\Database\Query\Builder|GameServerVehicle withTrashed()
 * @method static \Illuminate\Database\Query\Builder|GameServerVehicle withoutTrashed()
 * @mixin \Eloquent
 */
class GameServerVehicle extends Model
{
	use SoftDeletes;
	protected $connection = 'gameserver';
	protected $table = 'vehicle';
	public $timestamps = false;

	protected $casts = [
		'is_locked' => 'bool',
		'fuel' => 'float',
		'damage' => 'float',
		'position_x' => 'float',
		'position_y' => 'float',
		'position_z' => 'float',
		'direction_x' => 'float',
		'direction_y' => 'float',
		'direction_z' => 'float',
		'up_x' => 'float',
		'up_y' => 'float',
		'up_z' => 'float',
		'money' => 'int',
		'territory_id' => 'int'
	];

	protected $dates = [
		'spawned_at',
		'last_updated_at'
	];

	protected $fillable = [
		'class',
		'spawned_at',
		'account_uid',
		'is_locked',
		'fuel',
		'damage',
		'hitpoints',
		'position_x',
		'position_y',
		'position_z',
		'direction_x',
		'direction_y',
		'direction_z',
		'up_x',
		'up_y',
		'up_z',
		'cargo_items',
		'cargo_magazines',
		'cargo_weapons',
		'cargo_container',
		'last_updated_at',
		'pin_code',
		'money',
		'vehicle_texture',
		'territory_id',
		'nickname',
		'tuning_data',
		'exile_loading',
		'inventory',
		'marxet_id'
	];

	public function account()
	{
		return $this->belongsTo(GameServerAccount::class, 'account_uid');
	}
}
