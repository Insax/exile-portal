<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

class Account extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $connection = 'gameserver';
    protected $table = 'account';
    protected $primaryKey = 'uid';

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
        'marxet_locker' => 'int',
        'first_connect_at' => 'datetime',
        'last_connect_at' => 'datetime',
        'last_disconnect_at' => 'datetime',
        'last_reward_at' => 'datetime',
        'last_abandoned_at' => 'datetime',
        'esm_reward' => 'datetime'
    ];

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
     * @return BelongsTo
     */
    public function clan(): BelongsTo
    {
        return $this->belongsTo(Clan::class);
    }

    /**
     * @return HasOne
     */
    public function clanLeader(): HasOne
    {
        return $this->hasOne(Clan::class, 'leader_uid');
    }

    /**
     * @return HasMany
     */
    public function constructions(): HasMany
    {
        return $this->hasMany(Construction::class, 'account_uid');
    }

    /**
     * @return HasMany
     */
    public function containers(): HasMany
    {
        return $this->hasMany(Container::class, 'account_uid');
    }

    /**
     * @return HasOne
     */
    public function players(): HasOne
    {
        return $this->hasOne(Player::class, 'account_uid');
    }

    /**
     * @return HasOne
     */
    public function territory(): HasOne
    {
        return $this->hasOne(Territory::class, 'owner_uid');
    }

    /**
     * @return HasMany
     */
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class, 'account_uid');
    }

    /**
     * @return BelongsToMany
     */
    public function territories(): BelongsToMany
    {
        return $this->belongsToMany(Territory::class, 'territory_members', 'account_uid', 'territory_id');
    }

    /**
     * @return HasMany
     */
    public function playerHistory(): HasMany
    {
        return $this->hasMany(PlayerHistory::class, 'account_uid');
    }

    /**
     * @return HasMany
     */
    public function adminLog(): HasMany
    {
        return $this->hasMany(AdminLog::class, 'account_uid', 'uid');
    }

    /**
     * @return HasMany
     */
    public function antiTpLog(): HasMany
    {
        return $this->hasMany(AntiTPLog::class, 'account_uid', 'uid');
    }

    /**
     * @return HasMany
     */
    public function banLog(): HasMany
    {
        return $this->hasMany(BanLog::class, 'account_uid', 'uid');
    }

    /**
     * @return HasMany
     */
    public function breachingLog(): HasMany
    {
        return $this->hasMany(BreachingLog::class, 'account_uid', 'uid');
    }

    /**
     * @return HasMany
     */
    public function sentMessages(): HasMany
    {
        return $this->hasMany(ChatLog::class, 'sender_uid', 'uid');
    }

    /**
     * @return HasMany
     */
    public function receivedMessages(): HasMany
    {
        return $this->hasMany(ChatLog::class, 'recipient_uid', 'uid');
    }
}
