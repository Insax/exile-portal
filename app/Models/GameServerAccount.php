<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Account
 *
 * @property string $uid
 * @property int|null $clan_id
 * @property string $name
 * @property int $score
 * @property int $kills
 * @property int $deaths
 * @property int $locker
 * @property Carbon $first_connect_at
 * @property Carbon $last_connect_at
 * @property Carbon|null $last_disconnect_at
 * @property int $total_connections
 * @property int $whitelisted
 * @property Carbon|null $last_reward_at
 * @property int $exp_level
 * @property int $exp_total
 * @property int $exp_perkPoints
 * @property string|null $exp_perks
 * @property string $loadouts
 * @property int $forum_reward
 * @property Carbon|null $last_abandoned_at
 * @property string $owns_virtualgarage
 * @property string $enemy_territory_logout
 * @property Carbon|null $esm_reward
 * @property int $marxet_locker
 * @property GameServerClan|null $clan
 * @property Collection|GameServerClan[] $clans
 * @property Collection|GameServerConstruction[] $constructions
 * @property Collection|GameServerContainer[] $containers
 * @property Collection|GameServerPlayer[] $players
 * @property Collection|GameServerTerritory[] $territories
 * @property Collection|GameServerVehicle[] $vehicles
 * @package App\Models\Gameserver
 * @property-read int|null $clans_count
 * @property-read int|null $constructions_count
 * @property-read int|null $containers_count
 * @property-read int|null $players_count
 * @property-read int|null $territories_count
 * @property-read int|null $vehicles_count
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereDeaths($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereEnemyTerritoryLogout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereEsmReward($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereExpLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereExpPerkPoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereExpPerks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereExpTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereFirstConnectAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereForumReward($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereKills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereLastAbandonedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereLastConnectAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereLastDisconnectAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereLastRewardAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereLoadouts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereLocker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereMarxetLocker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereOwnsVirtualgarage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereTotalConnections($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereWhitelisted($value)
 * @mixin \Eloquent
 * @property string $friends
 * @property string $friend_last_reset_at
 * @property string $last_updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereFriendLastResetAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereFriends($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerAccount whereLastUpdatedAt($value)
 */
class GameServerAccount extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'account';
	protected $primaryKey = 'uid';
	public $incrementing = false;
	public $timestamps = false;

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

	protected $dates = [
		'first_connect_at',
		'last_connect_at',
		'last_disconnect_at',
		'last_reward_at',
		'last_abandoned_at',
		'esm_reward'
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

	public function clan()
	{
		return $this->belongsTo(GameServerClan::class);
	}

	public function clans()
	{
		return $this->hasMany(GameServerClan::class, 'leader_uid');
	}

	public function constructions()
	{
		return $this->hasMany(GameServerConstruction::class, 'account_uid');
	}

	public function containers()
	{
		return $this->hasMany(GameServerContainer::class, 'account_uid');
	}

	public function players()
	{
		return $this->hasMany(GameServerPlayer::class, 'account_uid');
	}

	public function territories()
	{
		return $this->hasMany(GameServerTerritory::class, 'owner_uid');
	}

	public function vehicles()
	{
		return $this->hasMany(GameServerVehicle::class, 'account_uid');
	}
}
