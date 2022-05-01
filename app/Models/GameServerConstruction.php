<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Construction
 *
 * @property int $id
 * @property string $class
 * @property string $account_uid
 * @property Carbon $spawned_at
 * @property float $position_x
 * @property float $position_y
 * @property float $position_z
 * @property float $direction_x
 * @property float $direction_y
 * @property float $direction_z
 * @property float $up_x
 * @property float $up_y
 * @property float $up_z
 * @property bool $is_locked
 * @property string $pin_code
 * @property int|null $damage
 * @property int|null $territory_id
 * @property Carbon $last_updated_at
 * @property string|null $deleted_at
 * @property string|null $construction_texture
 * @property string $construction_name
 * @property GameServerAccount $account
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction whereConstructionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction whereConstructionTexture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction whereDamage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction whereDirectionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction whereDirectionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction whereDirectionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction whereIsLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction whereLastUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction wherePinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction wherePositionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction wherePositionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction wherePositionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction whereSpawnedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction whereUpX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction whereUpY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerConstruction whereUpZ($value)
 * @mixin \Eloquent
 */
class GameServerConstruction extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'construction';
	public $timestamps = false;

	protected $casts = [
		'position_x' => 'float',
		'position_y' => 'float',
		'position_z' => 'float',
		'direction_x' => 'float',
		'direction_y' => 'float',
		'direction_z' => 'float',
		'up_x' => 'float',
		'up_y' => 'float',
		'up_z' => 'float',
		'is_locked' => 'bool',
		'damage' => 'int',
		'territory_id' => 'int'
	];

	protected $dates = [
		'spawned_at',
		'last_updated_at'
	];

	protected $fillable = [
		'class',
		'account_uid',
		'spawned_at',
		'position_x',
		'position_y',
		'position_z',
		'direction_x',
		'direction_y',
		'direction_z',
		'up_x',
		'up_y',
		'up_z',
		'is_locked',
		'pin_code',
		'damage',
		'territory_id',
		'last_updated_at',
		'construction_texture',
		'construction_name'
	];

	public function account()
	{
		return $this->belongsTo(GameServerAccount::class, 'account_uid');
	}
}
