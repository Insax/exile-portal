<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
