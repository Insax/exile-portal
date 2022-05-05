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
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vehicle
 *
 * @property int $id
 * @property string $class
 * @property Carbon $spawned_at
 * @property string $account_uid
 * @property bool $is_locked
 * @property float $fuel
 * @property float $damage
 * @property string|null $hitpoints
 * @property float $position_x
 * @property float $position_y
 * @property float $position_z
 * @property float $direction_x
 * @property float $direction_y
 * @property float $direction_z
 * @property float $up_x
 * @property float $up_y
 * @property float $up_z
 * @property string|null $cargo_items
 * @property string|null $cargo_magazines
 * @property string|null $cargo_weapons
 * @property string|null $cargo_container
 * @property Carbon $last_updated_at
 * @property string $pin_code
 * @property string|null $deleted_at
 * @property int $money
 * @property string|null $vehicle_texture
 * @property int|null $territory_id
 * @property string $nickname
 * @property string $tuning_data
 * @property string $exile_loading
 * @property string $inventory
 * @property string|null $marxet_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $trashed_at
 * @property Account $account
 * @property Collection|HotwireLog[] $hotwireLogs
 * @property Collection|SafeZoneLog[] $safeZoneLogs
 * @property Collection|VehicleDestroyedLog[] $vehicleDestroyedLogs
 * @property Collection|VirtualGarageLog[] $virtualGarageLogs
 * @package App\Models
 * @property-read int|null $hotwire_logs_count
 * @property-read int|null $safe_zone_logs_count
 * @property-read int|null $vehicle_destroyed_logs_count
 * @property-read int|null $virtual_garage_logs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle newQuery()
 * @method static \Illuminate\Database\Query\Builder|Vehicle onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCargoContainer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCargoItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCargoMagazines($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCargoWeapons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereDamage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereDirectionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereDirectionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereDirectionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereExileLoading($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereFuel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereHitpoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereIsLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereLastUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereMarxetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle wherePinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle wherePositionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle wherePositionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle wherePositionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereSpawnedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereTrashedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereTuningData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUpX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUpY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUpZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleTexture($value)
 * @method static \Illuminate\Database\Query\Builder|Vehicle withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Vehicle withoutTrashed()
 * @mixin \Eloquent
 */
class Vehicle extends Model
{
    use SoftDeletes;

	protected $connection = 'portal';
	protected $table = 'vehicles';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

    const DELETED_AT = 'trashed_at';

	protected $casts = [
		'id' => 'int',
		'is_locked' => 'bool',
		'fuel' => 'float',
		'damage' => 'float',
		'position_x' => 'float',
		'position_y' => 'float',
		'position_z' => 'float',
		'direction_x' => 'float',
		'direction_y' => 'float',
		'direction_z' => 'float',
		'up_x' => 'float',
		'up_y' => 'float',
		'up_z' => 'float',
		'money' => 'int',
		'territory_id' => 'int'
	];

	protected $dates = [
		'spawned_at',
		'last_updated_at',
		'trashed_at'
	];

    protected $guarded = [];

    public static function findOrCreateDummy(?int $vehicleId)
    {
        if($vehicleId == null || self::whereId($vehicleId)->exists())
            return;

        $dummyVehicle = self::create([
            'id' => $vehicleId,
            'class' => 'Dummy',
            'spawned_at' => Carbon::now(),
            'account_uid' => null,
            'is_locked' => 0,
            'fuel' => 1,
            'damage' => 0,
            'hitpoints' => '[]',
            'position_x' => '0',
            'position_y' => '0',
            'position_z' => '0',
            'direction_x' => '0',
            'direction_y' => '0',
            'direction_z' => '0',
            'up_x' => '0',
            'up_y' => '0',
            'up_z' => '0',
            'cargo_items' => '[[],[]]',
            'cargo_magazines' => '[]',
            'cargo_weapons' => '[]',
            'cargo_container' => '[]',
            'last_updated_at' => Carbon::now(),
            'pin_code' => '0000',
            'deleted_at' => Carbon::now(),
            'money' => 0,
            'vehicle_texture' => null,
            'territory_id' => null,
            'nickname' => 'Dummy',
            'tuning_data' => '[]',
            'exile_loading' => '',
            'inventory' => [[],[[],[]],[[],[]],[[],[]],[]],
            'marxet_id' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $dummyVehicle->delete();
    }

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}

	public function hotwireLogs(): HasMany
	{
		return $this->hasMany(HotwireLog::class);
	}

	public function safeZoneLogs(): HasMany
	{
		return $this->hasMany(SafeZoneLog::class);
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
