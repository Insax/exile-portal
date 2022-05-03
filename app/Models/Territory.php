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
 * Class Territory
 *
 * @property int $id
 * @property string|null $esm_custom_id
 * @property string $owner_uid
 * @property string $name
 * @property float $position_x
 * @property float $position_y
 * @property float $position_z
 * @property float $radius
 * @property int $level
 * @property string $flag_texture
 * @property bool $flag_stolen
 * @property string|null $flag_stolen_by_uid
 * @property Carbon|null $flag_stolen_at
 * @property Carbon $last_paid_at
 * @property bool $xm8_protectionmoney_notified
 * @property int $esm_payment_counter
 * @property string|null $deleted_at
 * @property string $territory_permissions
 * @property Carbon $last_updated_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $trashed_at
 * @property Account $account
 * @property Collection|BreachingLog[] $breachingLogs
 * @property Collection|ContainerPackLog[] $containerPackLogs
 * @property Collection|DisconnectPositionLog[] $disconnectPositionLogs
 * @property Collection|FlagHackingLog[] $flagHackingLogs
 * @property Collection|GrindingLog[] $grindingLogs
 * @property Collection|HotwireLog[] $hotwireLogs
 * @property Collection|LockLog[] $lockLogs
 * @property Collection|ReadableLogging[] $readableLoggings
 * @property Collection|SafeHackingLog[] $safeHackingLogs
 * @property TerritoryBuilder $territoryBuilder
 * @property Collection|TerritoryConstructionCountTime[] $territoryConstructionCountTimes
 * @property Collection|TerritoryContainerContent[] $territoryContainerContents
 * @property Collection|TerritoryContainerCountTime[] $territoryContainerCountTimes
 * @property Collection|TerritoryItemCountTime[] $territoryItemCountTimes
 * @property Collection|TerritoryLog[] $territoryLogs
 * @property TerritoryMember $territoryMember
 * @property TerritoryModerator $territoryModerator
 * @property Collection|TerritoryMoney[] $territoryMoneys
 * @property Collection|TerritoryOnlineTime[] $territoryOnlineTimes
 * @property Collection|TerritoryRaidTime[] $territoryRaidTimes
 * @property Collection|ThermalScannerLog[] $thermalScannerLogs
 * @property Collection|VirtualGarageLog[] $virtualGarageLogs
 * @package App\Models
 * @property-read int|null $breaching_logs_count
 * @property-read int|null $container_pack_logs_count
 * @property-read Collection|\App\Models\Container[] $containers
 * @property-read int|null $containers_count
 * @property-read int|null $disconnect_position_logs_count
 * @property-read int|null $flag_hacking_logs_count
 * @property-read int|null $grinding_logs_count
 * @property-read int|null $hotwire_logs_count
 * @property-read int|null $lock_logs_count
 * @property-read int|null $readable_loggings_count
 * @property-read int|null $safe_hacking_logs_count
 * @property-read int|null $territory_construction_count_times_count
 * @property-read int|null $territory_container_contents_count
 * @property-read int|null $territory_container_count_times_count
 * @property-read int|null $territory_item_count_times_count
 * @property-read int|null $territory_logs_count
 * @property-read int|null $territory_moneys_count
 * @property-read int|null $territory_online_times_count
 * @property-read int|null $territory_raid_times_count
 * @property-read int|null $thermal_scanner_logs_count
 * @property-read int|null $virtual_garage_logs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Territory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Territory newQuery()
 * @method static \Illuminate\Database\Query\Builder|Territory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Territory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereEsmCustomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereEsmPaymentCounter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereFlagStolen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereFlagStolenAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereFlagStolenByUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereFlagTexture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereLastPaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereLastUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereOwnerUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory wherePositionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory wherePositionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory wherePositionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereRadius($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereTerritoryPermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereTrashedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereXm8ProtectionmoneyNotified($value)
 * @method static \Illuminate\Database\Query\Builder|Territory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Territory withoutTrashed()
 * @mixin \Eloquent
 */
class Territory extends Model
{
    use SoftDeletes;

	protected $connection = 'portal';
	protected $table = 'territories';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

    const DELETED_AT = 'trashed_at';

	protected $casts = [
		'id' => 'int',
		'position_x' => 'float',
		'position_y' => 'float',
		'position_z' => 'float',
		'radius' => 'float',
		'level' => 'int',
		'flag_stolen' => 'bool',
		'xm8_protectionmoney_notified' => 'bool',
		'esm_payment_counter' => 'int'
	];

	protected $dates = [
		'flag_stolen_at',
		'last_paid_at',
		'last_updated_at',
		'trashed_at'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'owner_uid');
	}

    public function containers(): HasMany
    {
        return $this->hasMany(Container::class);
    }

	public function breachingLogs(): HasMany
	{
		return $this->hasMany(BreachingLog::class);
	}

	public function containerPackLogs(): HasMany
	{
		return $this->hasMany(ContainerPackLog::class);
	}

	public function disconnectPositionLogs(): HasMany
	{
		return $this->hasMany(DisconnectPositionLog::class);
	}

	public function flagHackingLogs(): HasMany
	{
		return $this->hasMany(FlagHackingLog::class);
	}

	public function grindingLogs(): HasMany
	{
		return $this->hasMany(GrindingLog::class);
	}

	public function hotwireLogs(): HasMany
	{
		return $this->hasMany(HotwireLog::class);
	}

	public function lockLogs(): HasMany
	{
		return $this->hasMany(LockLog::class);
	}

	public function readableLoggings(): HasMany
	{
		return $this->hasMany(ReadableLogging::class);
	}

	public function safeHackingLogs(): HasMany
	{
		return $this->hasMany(SafeHackingLog::class);
	}

	public function territoryBuilder(): HasOne
	{
		return $this->hasOne(TerritoryBuilder::class);
	}

	public function territoryConstructionCountTimes(): HasMany
	{
		return $this->hasMany(TerritoryConstructionCountTime::class);
	}

	public function territoryContainerContents(): HasMany
	{
		return $this->hasMany(TerritoryContainerContent::class);
	}

	public function territoryContainerCountTimes(): HasMany
	{
		return $this->hasMany(TerritoryContainerCountTime::class);
	}

	public function territoryItemCountTimes(): HasMany
	{
		return $this->hasMany(TerritoryItemCountTime::class);
	}

	public function territoryLogs(): HasMany
	{
		return $this->hasMany(TerritoryLog::class);
	}

	public function territoryMember(): HasOne
	{
		return $this->hasOne(TerritoryMember::class);
	}

	public function territoryModerator(): HasOne
	{
		return $this->hasOne(TerritoryModerator::class);
	}

	public function territoryMoneys(): HasMany
	{
		return $this->hasMany(TerritoryMoney::class);
	}

	public function territoryOnlineTimes(): HasMany
	{
		return $this->hasMany(TerritoryOnlineTime::class);
	}

	public function territoryRaidTimes(): HasMany
	{
		return $this->hasMany(TerritoryRaidTime::class);
	}

	public function thermalScannerLogs(): HasMany
	{
		return $this->hasMany(ThermalScannerLog::class);
	}

	public function virtualGarageLogs(): HasMany
	{
		return $this->hasMany(VirtualGarageLog::class);
	}
}
