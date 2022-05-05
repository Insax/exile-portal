<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class VehicleDestroyedLog
 *
 * @property int $id
 * @property string $account_uid
 * @property int|null $clan_id
 * @property string $player_pos
 * @property string $vehicle_class
 * @property int|null $vehicle_id
 * @property string $vehicle_pos
 * @property Carbon $time
 * @property Account $account
 * @property Clan|null $clan
 * @property Vehicle|null $vehicle
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleDestroyedLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleDestroyedLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleDestroyedLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleDestroyedLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleDestroyedLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleDestroyedLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleDestroyedLog wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleDestroyedLog whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleDestroyedLog whereVehicleClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleDestroyedLog whereVehicleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VehicleDestroyedLog whereVehiclePos($value)
 * @mixin \Eloquent
 */
class VehicleDestroyedLog extends Logging
{
	protected $connection = 'portal';
	protected $table = 'vehicle_destroyed_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'vehicle_id' => 'int'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}

	public function clan(): BelongsTo
	{
		return $this->belongsTo(Clan::class);
	}

	public function vehicle(): BelongsTo
	{
		return $this->belongsTo(Vehicle::class);
	}

    function toString(): string
    {
        return '';
    }
}
