<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
 * @property Carbon $last_reward_at
 * @property int $exp_level
 * @property int $exp_total
 * @property int $exp_perkPoints
 * @property string|null $exp_perks
 * @property string $loadouts
 * @property int $forum_reward
 * @property Carbon $last_abandoned_at
 * @property string $owns_virtualgarage
 * @property string $enemy_territory_logout
 * @property Carbon $esm_reward
 * @property int $marxet_locker
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|AccountMoney[] $accountMoneys
 * @property Collection|AccountMoneySpent[] $accountMoneySpents
 * @property Collection|AccountOnlineTime[] $accountOnlineTimes
 * @property ClanModerator $clanModerator
 * @property Collection|Clan[] $clans
 * @property Collection|Construction[] $constructions
 * @property Collection|Container[] $containers
 * @property Collection|Marxet[] $marxets
 * @property Collection|PlayerStat[] $playerStats
 * @property Collection|Player[] $players
 * @property Collection|SmVirtualgarage[] $smVirtualgarages
 * @property Collection|Territory[] $territories
 * @property TerritoryBuilder $territoryBuilder
 * @property TerritoryMember $territoryMember
 * @property TerritoryModerator $territoryModerator
 * @property Collection|Vehicle[] $vehicles
 *
 * @package App\Models
 */
class Account extends Model
{
	protected $connection = 'portal';
	protected $table = 'accounts';
	protected $primaryKey = 'uid';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

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

    protected $guarded = [];

	public function accountMoneys(): HasMany
	{
		return $this->hasMany(AccountMoney::class, 'account_uid');
	}

	public function accountMoneySpents(): HasMany
	{
		return $this->hasMany(AccountMoneySpent::class, 'account_uid');
	}

	public function accountOnlineTimes(): HasMany
	{
		return $this->hasMany(AccountOnlineTime::class, 'account_uid');
	}

	public function clanModerator(): HasOne
	{
		return $this->hasOne(ClanModerator::class, 'account_uid');
	}

	public function clan(): HasOne
	{
		return $this->hasOne(Clan::class, 'leader_uid');
	}

	public function constructions(): HasMany
	{
		return $this->hasMany(Construction::class, 'account_uid');
	}

	public function containers(): HasMany
	{
		return $this->hasMany(Container::class, 'account_uid');
	}

	public function marxets(): HasMany
	{
		return $this->hasMany(Marxet::class, 'sellerUID');
	}

	public function playerStats(): HasMany
	{
		return $this->hasMany(PlayerStat::class, 'victim');
	}

	public function players(): HasMany
	{
		return $this->hasMany(Player::class, 'account_uid');
	}

	public function smVirtualgarages(): HasMany
	{
		return $this->hasMany(SmVirtualgarage::class, 'owner_uid');
	}

	public function territories(): HasMany
	{
		return $this->hasMany(Territory::class, 'owner_uid');
	}

	public function territoryBuilder(): HasOne
	{
		return $this->hasOne(TerritoryBuilder::class, 'account_uid');
	}

	public function territoryMember(): HasOne
	{
		return $this->hasOne(TerritoryMember::class, 'account_uid');
	}

	public function territoryModerator(): HasOne
	{
		return $this->hasOne(TerritoryModerator::class, 'account_uid');
	}

	public function vehicles(): HasMany
	{
		return $this->hasMany(Vehicle::class, 'account_uid');
	}
}
