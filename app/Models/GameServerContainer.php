<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Container
 *
 * @property int $id
 * @property string $class
 * @property Carbon $spawned_at
 * @property string|null $account_uid
 * @property bool $is_locked
 * @property float $position_x
 * @property float $position_y
 * @property float $position_z
 * @property float $direction_x
 * @property float $direction_y
 * @property float $direction_z
 * @property float $up_x
 * @property float $up_y
 * @property float $up_z
 * @property string $cargo_items
 * @property string $cargo_magazines
 * @property string $cargo_weapons
 * @property string $cargo_container
 * @property Carbon $last_updated_at
 * @property string $pin_code
 * @property int|null $territory_id
 * @property string|null $deleted_at
 * @property int $money
 * @property Carbon|null $abandoned
 * @property string $inventory
 * @property GameServerAccount|null $account
 * @package App\Models\Gameserver
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereAbandoned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereCargoContainer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereCargoItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereCargoMagazines($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereCargoWeapons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereDirectionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereDirectionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereDirectionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereIsLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereLastUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer wherePinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer wherePositionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer wherePositionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer wherePositionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereSpawnedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereUpX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereUpY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerContainer whereUpZ($value)
 * @mixin \Eloquent
 */
class GameServerContainer extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'container';
	public $timestamps = false;

	protected $casts = [
		'is_locked' => 'bool',
		'position_x' => 'float',
		'position_y' => 'float',
		'position_z' => 'float',
		'direction_x' => 'float',
		'direction_y' => 'float',
		'direction_z' => 'float',
		'up_x' => 'float',
		'up_y' => 'float',
		'up_z' => 'float',
		'territory_id' => 'int',
		'money' => 'int'
	];

	protected $dates = [
		'spawned_at',
		'last_updated_at',
		'abandoned'
	];

	protected $fillable = [
		'class',
		'spawned_at',
		'account_uid',
		'is_locked',
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
		'territory_id',
		'money',
		'abandoned',
		'inventory'
	];

	public function account()
	{
		return $this->belongsTo(GameServerAccount::class, 'account_uid');
	}
}
