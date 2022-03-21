<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Clan extends Model
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
    protected $table = 'clan';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'leader_uid',
        'moderators'
    ];

    /**
     * Relationship - Clan and Account
     *
     * 1 Clan belongs to 1 Account.
     *
     * @return BelongsTo
     */
    public function leaderAccount(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'leader_uid', 'uid');
    }

    /**
     * Relationship - Clan and Account
     *
     * 1 Clan can have n Accounts
     *
     * @return HasMany
     */
    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }

    /**
     * Relationship - Clan and ClanMapMarkers
     *
     * 1 Clan can have n ClanMapMarkers
     *
     * @return HasMany
     */
    public function clan_map_markers(): HasMany
    {
        return $this->hasMany(ClanMapMarker::class);
    }
}
