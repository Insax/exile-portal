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
 * @property Account|null $account
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle newQuery()
 * @method static \Illuminate\Database\Query\Builder|Vehicle onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle query()
 * @method static \Illuminate\Database\Query\Builder|Vehicle withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Vehicle withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCargoContainer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCargoItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCargoMagazines($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCargoWeapons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereDamage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereDirectionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereDirectionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereDirectionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereExileLoading($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereFuel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereHitpoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereIsLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereLastUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereMarxetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle wherePinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle wherePositionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle wherePositionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle wherePositionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereSpawnedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereTuningData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUpX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUpY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUpZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleTexture($value)
 */
class Vehicle extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    protected $connection = 'gameserver';
    protected $table = 'vehicle';
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
        return $this->belongsTo(Account::class, 'account_uid');
    }
}
