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

/**
 * App\Models\Account
 *
 * @property string $uid
 * @property int|null $clan_id
 * @property string $name
 * @property int $score
 * @property int $kills
 * @property int $deaths
 * @property int $locker
 * @property \Illuminate\Support\Carbon $first_connect_at
 * @property \Illuminate\Support\Carbon $last_connect_at
 * @property \Illuminate\Support\Carbon|null $last_disconnect_at
 * @property int $total_connections
 * @property int $whitelisted
 * @property \Illuminate\Support\Carbon|null $last_reward_at
 * @property int $exp_level
 * @property int $exp_total
 * @property int $exp_perkPoints
 * @property string|null $exp_perks
 * @property string $loadouts
 * @property int $forum_reward
 * @property \Illuminate\Support\Carbon|null $last_abandoned_at
 * @property string $owns_virtualgarage
 * @property string $enemy_territory_logout
 * @property \Illuminate\Support\Carbon|null $esm_reward
 * @property int $marxet_locker
 * @property-read Clan|null $clan
 * @property-read Clan|null $clanLeader
 * @property-read Collection|Construction[] $constructions
 * @property-read int|null $constructions_count
 * @property-read Collection|Container[] $containers
 * @property-read int|null $containers_count
 * @property-read Collection|ParsedDailyRewardLog[] $dailyRewardLog
 * @property-read int|null $daily_reward_log_count
 * @property-read Collection|ParsedInmateMarketLog[] $inmateMarketLogBuyer
 * @property-read int|null $inmate_market_log_buyer_count
 * @property-read Collection|ParsedInmateMarketLog[] $inmateMarketLogSeller
 * @property-read int|null $inmate_market_log_seller_count
 * @property-read Collection|PlayerHistory[] $playerHistory
 * @property-read int|null $player_history_count
 * @property-read Player|null $players
 * @property-read Collection|Territory[] $territories
 * @property-read int|null $territories_count
 * @property-read Territory|null $territory
 * @property-read Collection|Vehicle[] $vehicles
 * @property-read int|null $vehicles_count
 * @method static Builder|Account filter(\App\Filters\QueryFilters $filters)
 * @method static Builder|Account newModelQuery()
 * @method static Builder|Account newQuery()
 * @method static Builder|Account query()
 * @method static Builder|Account whereClanId($value)
 * @method static Builder|Account whereDeaths($value)
 * @method static Builder|Account whereEnemyTerritoryLogout($value)
 * @method static Builder|Account whereEsmReward($value)
 * @method static Builder|Account whereExpLevel($value)
 * @method static Builder|Account whereExpPerkPoints($value)
 * @method static Builder|Account whereExpPerks($value)
 * @method static Builder|Account whereExpTotal($value)
 * @method static Builder|Account whereFirstConnectAt($value)
 * @method static Builder|Account whereForumReward($value)
 * @method static Builder|Account whereKills($value)
 * @method static Builder|Account whereLastAbandonedAt($value)
 * @method static Builder|Account whereLastConnectAt($value)
 * @method static Builder|Account whereLastDisconnectAt($value)
 * @method static Builder|Account whereLastRewardAt($value)
 * @method static Builder|Account whereLoadouts($value)
 * @method static Builder|Account whereLocker($value)
 * @method static Builder|Account whereMarxetLocker($value)
 * @method static Builder|Account whereName($value)
 * @method static Builder|Account whereOwnsVirtualgarage($value)
 * @method static Builder|Account whereScore($value)
 * @method static Builder|Account whereTotalConnections($value)
 * @method static Builder|Account whereUid($value)
 * @method static Builder|Account whereWhitelisted($value)
 * @mixin Eloquent
 */
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

    /**
     * Relationship - Account and DailyRewardLog
     *
     * 1 Account can have n DailyRewardLog
     *
     * @return HasMany
     */
    public function dailyRewardLog(): HasMany
    {
        return $this->hasMany(ParsedDailyRewardLog::class, 'account_uid');
    }

    /**
     * @return HasMany
     */
    public function inmateMarketLogSeller(): HasMany
    {
        return $this->hasMany(ParsedInmateMarketLog::class, 'source_account_id');
    }

    /**
     * @return HasMany
     */
    public function inmateMarketLogBuyer(): HasMany
    {
        return $this->hasMany(ParsedInmateMarketLog::class, 'receiver_account_id');
    }
}
