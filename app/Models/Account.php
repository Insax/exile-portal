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
 * @property string $friends
 * @property Carbon $friend_last_reset_at
 * @property Carbon $last_updated_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|AccountMoney[] $accountMoneys
 * @property Collection|AccountMoneySpent[] $accountMoneySpents
 * @property Collection|AccountOnlineTime[] $accountOnlineTimes
 * @property Collection|AntiTeleportLog[] $antiTeleportLogs
 * @property Collection|BreachingLog[] $breachingLogs
 * @property Collection|ChatLog[] $chatLogs
 * @property ClanModerator $clanModerator
 * @property Collection|Clan[] $clans
 * @property Collection|Construction[] $constructions
 * @property Collection|ContainerPackLog[] $containerPackLogs
 * @property Collection|Container[] $containers
 * @property Collection|CraftingLog[] $craftingLogs
 * @property Collection|DisconnectPositionLog[] $disconnectPositionLogs
 * @property Collection|FamilyLog[] $familyLogs
 * @property Collection|FlagHackingLog[] $flagHackingLogs
 * @property Collection|GrindingLog[] $grindingLogs
 * @property Collection|HackLog[] $hackLogs
 * @property Collection|HotwireLog[] $hotwireLogs
 * @property Collection|InmateMarketLog[] $inmateMarketLogs
 * @property Collection|LoadoutTraderLog[] $loadoutTraderLogs
 * @property Collection|LockLog[] $lockLogs
 * @property Collection|LockerLog[] $lockerLogs
 * @property Collection|Marxet[] $marxets
 * @property Collection|PartyLog[] $partyLogs
 * @property Collection|PlayerKillLog[] $playerKillLogs
 * @property Collection|PlayerStat[] $playerStats
 * @property Collection|Player[] $players
 * @property Collection|PoptabLog[] $poptabLogs
 * @property Collection|ReadableLogging[] $readableLoggings
 * @property Collection|SafeHackingLog[] $safeHackingLogs
 * @property Collection|SafeZoneLog[] $safeZoneLogs
 * @property Collection|SmVirtualgarage[] $smVirtualgarages
 * @property Collection|Territory[] $territories
 * @property TerritoryBuilder $territoryBuilder
 * @property Collection|TerritoryLog[] $territoryLogs
 * @property TerritoryMember $territoryMember
 * @property TerritoryModerator $territoryModerator
 * @property Collection|ThermalScannerLog[] $thermalScannerLogs
 * @property Collection|VehicleDestroyedLog[] $vehicleDestroyedLogs
 * @property Collection|Vehicle[] $vehicles
 * @property Collection|VirtualGarageLog[] $virtualGarageLogs
 * @package App\Models
 * @property-read int|null $account_money_spents_count
 * @property-read int|null $account_moneys_count
 * @property-read int|null $account_online_times_count
 * @property-read int|null $anti_teleport_logs_count
 * @property-read int|null $breaching_logs_count
 * @property-read int|null $chat_logs_count
 * @property-read \App\Models\Clan|null $clan
 * @property-read int|null $constructions_count
 * @property-read int|null $container_pack_logs_count
 * @property-read int|null $containers_count
 * @property-read int|null $crafting_logs_count
 * @property-read int|null $disconnect_position_logs_count
 * @property-read int|null $family_logs_count
 * @property-read int|null $flag_hacking_logs_count
 * @property-read int|null $grinding_logs_count
 * @property-read int|null $hack_logs_count
 * @property-read int|null $hotwire_logs_count
 * @property-read int|null $inmate_market_logs_count
 * @property-read int|null $loadout_trader_logs_count
 * @property-read int|null $lock_logs_count
 * @property-read int|null $locker_logs_count
 * @property-read int|null $marxets_count
 * @property-read int|null $party_logs_count
 * @property-read int|null $player_kill_logs_count
 * @property-read int|null $player_stats_count
 * @property-read int|null $players_count
 * @property-read int|null $poptab_logs_count
 * @property-read int|null $readable_loggings_count
 * @property-read int|null $safe_hacking_logs_count
 * @property-read int|null $safe_zone_logs_count
 * @property-read int|null $sm_virtualgarages_count
 * @property-read int|null $territories_count
 * @property-read int|null $territory_logs_count
 * @property-read int|null $thermal_scanner_logs_count
 * @property-read int|null $vehicle_destroyed_logs_count
 * @property-read int|null $vehicles_count
 * @property-read int|null $virtual_garage_logs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Account newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Account newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Account query()
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereDeaths($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereEnemyTerritoryLogout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereEsmReward($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereExpLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereExpPerkPoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereExpPerks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereExpTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereFirstConnectAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereForumReward($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereFriendLastResetAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereFriends($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereKills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereLastAbandonedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereLastConnectAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereLastDisconnectAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereLastRewardAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereLastUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereLoadouts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereLocker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereMarxetLocker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereOwnsVirtualgarage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereTotalConnections($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereWhitelisted($value)
 * @mixin \Eloquent
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
		'esm_reward',
		'friend_last_reset_at',
		'last_updated_at'
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

	public function antiTeleportLogs(): HasMany
	{
		return $this->hasMany(AntiTeleportLog::class, 'account_uid');
	}

	public function breachingLogs(): HasMany
	{
		return $this->hasMany(BreachingLog::class, 'account_uid');
	}

	public function chatLogs(): HasMany
	{
		return $this->hasMany(ChatLog::class, 'sender_uid');
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

	public function containerPackLogs(): HasMany
	{
		return $this->hasMany(ContainerPackLog::class, 'account_uid');
	}

	public function containers(): HasMany
	{
		return $this->hasMany(Container::class, 'account_uid');
	}

	public function craftingLogs(): HasMany
	{
		return $this->hasMany(CraftingLog::class, 'account_uid');
	}

	public function disconnectPositionLogs(): HasMany
	{
		return $this->hasMany(DisconnectPositionLog::class, 'account_uid');
	}

	public function familyLogs(): HasMany
	{
		return $this->hasMany(FamilyLog::class, 'target_account_uid');
	}

	public function flagHackingLogs(): HasMany
	{
		return $this->hasMany(FlagHackingLog::class, 'account_uid');
	}

	public function grindingLogs(): HasMany
	{
		return $this->hasMany(GrindingLog::class, 'account_uid');
	}

	public function hackLogs(): HasMany
	{
		return $this->hasMany(HackLog::class, 'old_account_uid');
	}

	public function hotwireLogs(): HasMany
	{
		return $this->hasMany(HotwireLog::class, 'account_uid');
	}

	public function inmateMarketLogs(): HasMany
	{
		return $this->hasMany(InmateMarketLog::class, 'seller_account_uid');
	}

	public function loadoutTraderLogs(): HasMany
	{
		return $this->hasMany(LoadoutTraderLog::class, 'account_uid');
	}

	public function lockLogs(): HasMany
	{
		return $this->hasMany(LockLog::class, 'account_uid');
	}

	public function lockerLogs(): HasMany
	{
		return $this->hasMany(LockerLog::class, 'account_uid');
	}

	public function marxets(): HasMany
	{
		return $this->hasMany(Marxet::class, 'sellerUID');
	}

	public function partyLogs(): HasMany
	{
		return $this->hasMany(PartyLog::class, 'invited_account_uid');
	}

	public function playerKillLogs(): HasMany
	{
		return $this->hasMany(PlayerKillLog::class, 'victim_account_uid');
	}

	public function playerStats(): HasMany
	{
		return $this->hasMany(PlayerStat::class, 'victim');
	}

	public function players(): HasMany
	{
		return $this->hasMany(Player::class, 'account_uid');
	}

	public function poptabLogs(): HasMany
	{
		return $this->hasMany(PoptabLog::class, 'account_uid');
	}

	public function readableLoggings(): HasMany
	{
		return $this->hasMany(ReadableLogging::class, 'account_uid');
	}

	public function safeHackingLogs(): HasMany
	{
		return $this->hasMany(SafeHackingLog::class, 'account_uid');
	}

	public function safeZoneLogs(): HasMany
	{
		return $this->hasMany(SafeZoneLog::class, 'vehicle_owner_uid');
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

	public function territoryLogs(): HasMany
	{
		return $this->hasMany(TerritoryLog::class, 'target_account_uid');
	}

	public function territoryMember(): HasOne
	{
		return $this->hasOne(TerritoryMember::class, 'account_uid');
	}

	public function territoryModerator(): HasOne
	{
		return $this->hasOne(TerritoryModerator::class, 'account_uid');
	}

	public function thermalScannerLogs(): HasMany
	{
		return $this->hasMany(ThermalScannerLog::class, 'account_uid');
	}

	public function vehicleDestroyedLogs(): HasMany
	{
		return $this->hasMany(VehicleDestroyedLog::class, 'account_uid');
	}

	public function vehicles(): HasMany
	{
		return $this->hasMany(Vehicle::class, 'account_uid');
	}

	public function virtualGarageLogs(): HasMany
	{
		return $this->hasMany(VirtualGarageLog::class, 'account_uid');
	}
}
