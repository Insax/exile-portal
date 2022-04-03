<?php

namespace App\Models;

use App\Models\TerritoryContainerContent;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;


class Territory extends Model
{
    public $timestamps = false;

    protected $connection = 'gameserver';
    protected $table = 'territory';
    protected $casts = [
        'position_x' => 'float',
        'position_y' => 'float',
        'position_z' => 'float',
        'radius' => 'float',
        'level' => 'int',
        'flag_stolen' => 'bool',
        'xm8_protectionmoney_notified' => 'bool',
        'esm_payment_counter' => 'int',
        'flag_stolen_at' => 'datetime',
        'last_paid_at' => 'datetime'
    ];

    protected $fillable = [
        'esm_custom_id',
        'owner_uid',
        'name',
        'position_x',
        'position_y',
        'position_z',
        'radius',
        'level',
        'flag_texture',
        'flag_stolen',
        'flag_stolen_by_uid',
        'flag_stolen_at',
        'last_paid_at',
        'xm8_protectionmoney_notified',
        'build_rights',
        'moderators',
        'esm_payment_counter',
        'territory_permissions'
    ];

    /**
     * @return BelongsTo
     */
    public function ownerAccount(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'owner_uid');
    }

    /**
     * @return BelongsToMany
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Account::class, 'territory_members', 'territory_id', 'account_uid');
    }

    /**
     * @return HasOne
     */
    public function territoryFlagStealer(): HasOne
    {
        return $this->hasOne(Account::class, 'uid', 'flag_stolen_by_uid');
    }

    public function containers(): HasMany
    {
        return $this->hasMany(Container::class, 'territory_id', 'id');
    }

    public function containerContent(): HasMany
    {
        return $this->hasMany(TerritoryContainerContent::class, 'territory_id', 'id');
    }

    public function breachingLog(): HasMany
    {
        return $this->hasMany(BreachingLog::class);
    }
}
