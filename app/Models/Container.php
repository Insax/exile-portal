<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Container
 *
 * @property int $id
 * @property string $class
 * @property \Illuminate\Support\Carbon $spawned_at
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
 * @property \Illuminate\Support\Carbon $last_updated_at
 * @property string $pin_code
 * @property int|null $territory_id
 * @property string|null $deleted_at
 * @property int $money
 * @property \Illuminate\Support\Carbon|null $abandoned
 * @property string $inventory
 * @property-read \App\Models\Account|null $account
 * @method static \Illuminate\Database\Eloquent\Builder|Container newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Container newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Container query()
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereAbandoned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereCargoContainer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereCargoItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereCargoMagazines($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereCargoWeapons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereDirectionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereDirectionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereDirectionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereIsLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereLastUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container wherePinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container wherePositionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container wherePositionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container wherePositionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereSpawnedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereUpX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereUpY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereUpZ($value)
 * @mixin \Eloquent
 */
class Container extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The connection name for the model.
     *
     * @var string|null
     */
    protected $connection = 'gameserver';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'container';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
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

    /**
     * The attributes that should be mutated to dates.
     *
     * @deprecated Use the "casts" property
     *
     * @var array
     */
    protected $dates = [
        'spawned_at',
        'last_updated_at',
        'abandoned'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
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

    /**
     * Relationship - Container and Account
     *
     * N Container belong to 1 Account.
     *
     * @return BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_uid');
    }
}
