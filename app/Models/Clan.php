<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Clan
 *
 * @property int $id
 * @property string $name
 * @property string $leader_uid
 * @property Carbon $last_updated_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property Account $account
 * @property Collection|BreachingLog[] $breachingLogs
 * @property ClanModerator $clanModerator
 * @property Collection|ClanMoney[] $clanMoneys
 * @property Collection|ContainerPackLog[] $containerPackLogs
 * @property Collection|CraftingLog[] $craftingLogs
 * @property Collection|DisconnectPositionLog[] $disconnectPositionLogs
 * @property Collection|FamilyLog[] $familyLogs
 * @property Collection|FlagHackingLog[] $flagHackingLogs
 * @property Collection|GrindingLog[] $grindingLogs
 * @property Collection|ClanOnlineTime[] $groupOnlineTimes
 * @property Collection|HotwireLog[] $hotwireLogs
 * @property Collection|LoadoutTraderLog[] $loadoutTraderLogs
 * @property Collection|LockLog[] $lockLogs
 * @property Collection|LockerLog[] $lockerLogs
 * @property Collection|PartyLog[] $partyLogs
 * @property Collection|PlayerKillLog[] $playerKillLogs
 * @property Collection|PoptabLog[] $poptabLogs
 * @property Collection|ReadableLogging[] $readableLoggings
 * @property Collection|SafeHackingLog[] $safeHackingLogs
 * @property Collection|SafeZoneLog[] $safeZoneLogs
 * @property Collection|TerritoryLog[] $territoryLogs
 * @property Collection|VehicleDestroyedLog[] $vehicleDestroyedLogs
 * @property Collection|VirtualGarageLog[] $virtualGarageLogs
 * @package App\Models
 * @property-read Collection|\App\Models\Account[] $accounts
 * @property-read int|null $accounts_count
 * @property-read int|null $breaching_logs_count
 * @property-read int|null $clan_moneys_count
 * @property-read int|null $container_pack_logs_count
 * @property-read int|null $crafting_logs_count
 * @property-read int|null $disconnect_position_logs_count
 * @property-read int|null $family_logs_count
 * @property-read int|null $flag_hacking_logs_count
 * @property-read int|null $grinding_logs_count
 * @property-read int|null $group_online_times_count
 * @property-read int|null $hotwire_logs_count
 * @property-read int|null $loadout_trader_logs_count
 * @property-read int|null $lock_logs_count
 * @property-read int|null $locker_logs_count
 * @property-read int|null $party_logs_count
 * @property-read int|null $player_kill_logs_count
 * @property-read int|null $poptab_logs_count
 * @property-read int|null $readable_loggings_count
 * @property-read int|null $safe_hacking_logs_count
 * @property-read int|null $safe_zone_logs_count
 * @property-read int|null $territory_logs_count
 * @property-read int|null $vehicle_destroyed_logs_count
 * @property-read int|null $virtual_garage_logs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Clan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clan newQuery()
 * @method static \Illuminate\Database\Query\Builder|Clan onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Clan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Clan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clan whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clan whereLastUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clan whereLeaderUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Clan withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Clan withoutTrashed()
 * @mixin \Eloquent
 */
class Clan extends Model
{
    use SoftDeletes;

	protected $connection = 'portal';
	protected $table = 'clans';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $dates = [
		'last_updated_at'
	];

    protected $guarded = [];

    public static function findOrCreateDummy(?int $clanId)
    {
        if($clanId == null || self::whereId($clanId)->withTrashed()->exists())
            return;

        $dummyClan = self::create([
            'id' => $clanId,
            'name' => 'Dummy',
            'leader_uid' => null,
            'last_updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $dummyClan->delete();
    }

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'leader_uid');
	}

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }

	public function breachingLogs(): HasMany
	{
		return $this->hasMany(BreachingLog::class);
	}

	public function clanModerator(): HasOne
	{
		return $this->hasOne(ClanModerator::class);
	}

	public function clanMoneys(): HasMany
	{
		return $this->hasMany(ClanMoney::class);
	}

	public function containerPackLogs(): HasMany
	{
		return $this->hasMany(ContainerPackLog::class);
	}

	public function craftingLogs(): HasMany
	{
		return $this->hasMany(CraftingLog::class);
	}

	public function disconnectPositionLogs(): HasMany
	{
		return $this->hasMany(DisconnectPositionLog::class);
	}

	public function familyLogs(): HasMany
	{
		return $this->hasMany(FamilyLog::class);
	}

	public function flagHackingLogs(): HasMany
	{
		return $this->hasMany(FlagHackingLog::class);
	}

	public function grindingLogs(): HasMany
	{
		return $this->hasMany(GrindingLog::class);
	}

	public function groupOnlineTimes(): HasMany
	{
		return $this->hasMany(ClanOnlineTime::class);
	}

	public function hotwireLogs(): HasMany
	{
		return $this->hasMany(HotwireLog::class);
	}

	public function loadoutTraderLogs(): HasMany
	{
		return $this->hasMany(LoadoutTraderLog::class);
	}

	public function lockLogs(): HasMany
	{
		return $this->hasMany(LockLog::class);
	}

	public function lockerLogs(): HasMany
	{
		return $this->hasMany(LockerLog::class);
	}

	public function partyLogs(): HasMany
	{
		return $this->hasMany(PartyLog::class, 'invited_player_clan_id');
	}

	public function playerKillLogs(): HasMany
	{
		return $this->hasMany(PlayerKillLog::class, 'victim_clan_id');
	}

	public function poptabLogs(): HasMany
	{
		return $this->hasMany(PoptabLog::class);
	}

	public function readableLoggings(): HasMany
	{
		return $this->hasMany(ReadableLogging::class);
	}

	public function safeHackingLogs(): HasMany
	{
		return $this->hasMany(SafeHackingLog::class);
	}

	public function safeZoneLogs(): HasMany
	{
		return $this->hasMany(SafeZoneLog::class, 'vehicle_owner_clan_id');
	}

	public function territoryLogs(): HasMany
	{
		return $this->hasMany(TerritoryLog::class);
	}

	public function vehicleDestroyedLogs(): HasMany
	{
		return $this->hasMany(VehicleDestroyedLog::class);
	}

	public function virtualGarageLogs(): HasMany
	{
		return $this->hasMany(VirtualGarageLog::class);
	}
}
