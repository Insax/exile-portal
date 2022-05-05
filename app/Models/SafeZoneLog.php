<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class SafeZoneLog
 *
 * @property int $id
 * @property string $action
 * @property string $account_uid
 * @property int|null $clan_id
 * @property string $vehicle
 * @property int|null $vehicle_id
 * @property string $player_pos
 * @property string $vehicle_pos
 * @property string|null $vehicle_owner_uid
 * @property int|null $vehicle_owner_clan_id
 * @property Carbon $time
 * @property Account $account
 * @property Account|null $ownerAccount
 * @property Clan|null $clan
 * @property Clan|null $ownerClan
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|SafeZoneLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SafeZoneLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SafeZoneLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|SafeZoneLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeZoneLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeZoneLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeZoneLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeZoneLog wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeZoneLog whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeZoneLog whereVehicle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeZoneLog whereVehicleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeZoneLog whereVehicleOwnerClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeZoneLog whereVehicleOwnerUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeZoneLog whereVehiclePos($value)
 * @mixin \Eloquent
 */
class SafeZoneLog extends Logging
{
	protected $connection = 'portal';
	protected $table = 'safe_zone_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'vehicle_id' => 'int',
		'vehicle_owner_clan_id' => 'int'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}

    public function ownerAccount(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_uid');
    }

	public function clan(): BelongsTo
	{
		return $this->belongsTo(Clan::class, 'clan_id')->withTrashed();
	}

    public function ownerClan(): BelongsTo
    {
        return $this->belongsTo(Clan::class, 'vehicle_owner_clan_id')->withTrashed();
    }

	public function vehicle(): BelongsTo
	{
		return $this->belongsTo(Vehicle::class);
	}

    function toString(): string
    {
        return view('logs.entries.safezone', ['log' => $this]);
    }
}
