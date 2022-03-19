<?php

namespace App\Models;

use App\Filters\QueryFilters;
use App\Traits\Filterable;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Account extends Model
{
    use Filterable;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

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
    protected $table = 'account';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'uid';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'clan_id' => 'int',
        'score' => 'int',
        'kills' => 'int',
        'deaths' => 'int',
        'locker' => 'int',
        'total_connections' => 'int',
        'whitelisted' => 'int',
        'exp_level' => 'int',
        'exp_total' => 'int',
        'exp_perkPoints' => 'int',
        'forum_reward' => 'int',
        'marxet_locker' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @deprecated Use the "casts" property
     *
     * @var array
     */
    protected $dates = [
        'first_connect_at',
        'last_connect_at',
        'last_disconnect_at',
        'last_reward_at',
        'last_abandoned_at',
        'esm_reward'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'clan_id',
        'name',
        'score',
        'kills',
        'deaths',
        'locker',
        'first_connect_at',
        'last_connect_at',
        'last_disconnect_at',
        'total_connections',
        'whitelisted',
        'last_reward_at',
        'exp_level',
        'exp_total',
        'exp_perkPoints',
        'exp_perks',
        'loadouts',
        'forum_reward',
        'last_abandoned_at',
        'owns_virtualgarage',
        'enemy_territory_logout',
        'esm_reward',
        'marxet_locker'
    ];

    /**
     * Relationship - Clan and Account
     *
     * 1 Account belongs to 1 Clan.
     *
     * @return BelongsTo
     */
    public function clan(): BelongsTo
    {
        return $this->belongsTo(Clan::class);
    }

    /**
     * Relationship - Account and Clan
     *
     * 1 Account has 1 ClanLeader
     *
     * @return HasOne
     */
    public function clanLeader(): HasOne
    {
        return $this->hasOne(Clan::class, 'leader_uid');
    }

    /**
     * Relationship - Account and Construction
     *
     * 1 Account can have n Constructions
     *
     * @return HasMany
     */
    public function constructions(): HasMany
    {
        return $this->hasMany(Construction::class, 'account_uid');
    }

    /**
     * Relationship - Account and Container
     *
     * 1 Account can have n Container.
     *
     * @return HasMany
     */
    public function containers(): HasMany
    {
        return $this->hasMany(Container::class, 'account_uid');
    }

    /**
     * Relationship - Account and Player
     *
     * 1 Account can have 1 Player
     *
     * @return HasOne
     */
    public function players(): HasOne
    {
        return $this->hasOne(Player::class, 'account_uid');
    }

    /**
     * Relationship - Account and Territory
     *
     * 1 player can have one Territory
     *
     * @return HasOne
     */
    public function territory(): HasOne
    {
        return $this->hasOne(Territory::class, 'owner_uid');
    }

    /**
     * Relationship - Account and Vehicle
     *
     * 1 player can have n Vehicle
     *
     * @return HasMany
     */
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class, 'account_uid');
    }

    /**
     * Relationship - Account and Territories
     *
     * 1 Account belongs to n Territories as Member.
     *
     * @return BelongsToMany
     */
    public function territories(): BelongsToMany
    {
        return $this->belongsToMany(Territory::class, 'territory_members', 'account_uid', 'territory_id');
    }

    /**
     * Relationship - Account and PlayerHistory
     *
     * 1 Account can have n PlayerHistory
     *
     * @return HasMany
     */
    public function playerHistory(): HasMany
    {
        return $this->hasMany(PlayerHistory::class, 'account_uid');
    }
}
