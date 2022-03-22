<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Construction
 *
 * @property int $id
 * @property string $class
 * @property string $account_uid
 * @property \Illuminate\Support\Carbon $spawned_at
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
 * @property \Illuminate\Support\Carbon $last_updated_at
 * @property string|null $deleted_at
 * @property string|null $construction_texture
 * @property string $construction_name
 * @property-read \App\Models\Account $account
 * @method static \Illuminate\Database\Eloquent\Builder|Construction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Construction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Construction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereConstructionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereConstructionTexture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereDamage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereDirectionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereDirectionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereDirectionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereIsLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereLastUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction wherePinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction wherePositionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction wherePositionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction wherePositionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereSpawnedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereUpX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereUpY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereUpZ($value)
 * @mixin \Eloquent
 */
class Construction extends Model
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
    protected $table = 'construction';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
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

    /**
     * The attributes that should be mutated to dates.
     *
     * @deprecated Use the "casts" property
     *
     * @var array
     */
    protected $dates = [
        'spawned_at',
        'last_updated_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
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

    /**
     * Relationship - Construction and Account
     *
     * N constructions belong to one Player.
     *
     * @return BelongsTo
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_uid');
    }
}
