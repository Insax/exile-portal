<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Player
 *
 * @property int $id
 * @property string $name
 * @property string $account_uid
 * @property int $money
 * @property float $damage
 * @property float $hunger
 * @property float $thirst
 * @property float $alcohol
 * @property float $temperature
 * @property float $wetness
 * @property float $oxygen_remaining
 * @property float $bleeding_remaining
 * @property string $hitpoints
 * @property float $direction
 * @property float $position_x
 * @property float $position_y
 * @property float $position_z
 * @property Carbon $spawned_at
 * @property string $assigned_items
 * @property string $backpack
 * @property string $backpack_items
 * @property string $backpack_magazines
 * @property string $backpack_weapons
 * @property string $current_weapon
 * @property string $goggles
 * @property string $handgun_items
 * @property string $handgun_weapon
 * @property string $headgear
 * @property string $binocular
 * @property string $loaded_magazines
 * @property string $primary_weapon
 * @property string $primary_weapon_items
 * @property string $secondary_weapon
 * @property string $secondary_weapon_items
 * @property string $uniform
 * @property string $uniform_items
 * @property string $uniform_magazines
 * @property string $uniform_weapons
 * @property string $vest
 * @property string $vest_items
 * @property string $vest_magazines
 * @property string $vest_weapons
 * @property Carbon $last_updated_at
 * @property string $loadout
 * @property-read Account $account
 * @method static Builder|Player newModelQuery()
 * @method static Builder|Player newQuery()
 * @method static Builder|Player query()
 * @method static Builder|Player whereAccountUid($value)
 * @method static Builder|Player whereAlcohol($value)
 * @method static Builder|Player whereAssignedItems($value)
 * @method static Builder|Player whereBackpack($value)
 * @method static Builder|Player whereBackpackItems($value)
 * @method static Builder|Player whereBackpackMagazines($value)
 * @method static Builder|Player whereBackpackWeapons($value)
 * @method static Builder|Player whereBinocular($value)
 * @method static Builder|Player whereBleedingRemaining($value)
 * @method static Builder|Player whereCurrentWeapon($value)
 * @method static Builder|Player whereDamage($value)
 * @method static Builder|Player whereDirection($value)
 * @method static Builder|Player whereGoggles($value)
 * @method static Builder|Player whereHandgunItems($value)
 * @method static Builder|Player whereHandgunWeapon($value)
 * @method static Builder|Player whereHeadgear($value)
 * @method static Builder|Player whereHitpoints($value)
 * @method static Builder|Player whereHunger($value)
 * @method static Builder|Player whereId($value)
 * @method static Builder|Player whereLastUpdatedAt($value)
 * @method static Builder|Player whereLoadedMagazines($value)
 * @method static Builder|Player whereLoadout($value)
 * @method static Builder|Player whereMoney($value)
 * @method static Builder|Player whereName($value)
 * @method static Builder|Player whereOxygenRemaining($value)
 * @method static Builder|Player wherePositionX($value)
 * @method static Builder|Player wherePositionY($value)
 * @method static Builder|Player wherePositionZ($value)
 * @method static Builder|Player wherePrimaryWeapon($value)
 * @method static Builder|Player wherePrimaryWeaponItems($value)
 * @method static Builder|Player whereSecondaryWeapon($value)
 * @method static Builder|Player whereSecondaryWeaponItems($value)
 * @method static Builder|Player whereSpawnedAt($value)
 * @method static Builder|Player whereTemperature($value)
 * @method static Builder|Player whereThirst($value)
 * @method static Builder|Player whereUniform($value)
 * @method static Builder|Player whereUniformItems($value)
 * @method static Builder|Player whereUniformMagazines($value)
 * @method static Builder|Player whereUniformWeapons($value)
 * @method static Builder|Player whereVest($value)
 * @method static Builder|Player whereVestItems($value)
 * @method static Builder|Player whereVestMagazines($value)
 * @method static Builder|Player whereVestWeapons($value)
 * @method static Builder|Player whereWetness($value)
 * @mixin Eloquent
 */
class Player extends Model
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
    protected $table = 'player';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'money' => 'int',
        'damage' => 'float',
        'hunger' => 'float',
        'thirst' => 'float',
        'alcohol' => 'float',
        'temperature' => 'float',
        'wetness' => 'float',
        'oxygen_remaining' => 'float',
        'bleeding_remaining' => 'float',
        'direction' => 'float',
        'position_x' => 'float',
        'position_y' => 'float',
        'position_z' => 'float'
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
        'name',
        'money',
        'damage',
        'hunger',
        'thirst',
        'alcohol',
        'temperature',
        'wetness',
        'oxygen_remaining',
        'bleeding_remaining',
        'hitpoints',
        'direction',
        'position_x',
        'position_y',
        'position_z',
        'spawned_at',
        'assigned_items',
        'backpack',
        'backpack_items',
        'backpack_magazines',
        'backpack_weapons',
        'current_weapon',
        'goggles',
        'handgun_items',
        'handgun_weapon',
        'headgear',
        'binocular',
        'loaded_magazines',
        'primary_weapon',
        'primary_weapon_items',
        'secondary_weapon',
        'secondary_weapon_items',
        'uniform',
        'uniform_items',
        'uniform_magazines',
        'uniform_weapons',
        'vest',
        'vest_items',
        'vest_magazines',
        'vest_weapons',
        'last_updated_at',
        'loadout'
    ];

    /**
     * Relationship - Player and Account
     *
     * 1 Player belong to 1 Account.
     *
     * @return BelongsTo
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_uid');
    }
}
