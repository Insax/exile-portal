<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Clan
 *
 * @property int $id
 * @property string $name
 * @property string $leader_uid
 * @property string $created_at
 * @property string $moderators
 * @property-read Collection|Account[] $accounts
 * @property-read int|null $accounts_count
 * @property-read Collection|ClanMapMarker[] $clan_map_markers
 * @property-read int|null $clan_map_markers_count
 * @property-read Account $leaderAccount
 * @method static Builder|Clan newModelQuery()
 * @method static Builder|Clan newQuery()
 * @method static Builder|Clan query()
 * @method static Builder|Clan whereCreatedAt($value)
 * @method static Builder|Clan whereId($value)
 * @method static Builder|Clan whereLeaderUid($value)
 * @method static Builder|Clan whereModerators($value)
 * @method static Builder|Clan whereName($value)
 * @mixin Eloquent
 */
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
