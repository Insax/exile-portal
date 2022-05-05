<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class HotwireLog
 *
 * @property int $id
 * @property string $account_uid
 * @property int|null $clan_id
 * @property string $vehicle_class
 * @property int $vehicle_id
 * @property int|null $territory_id
 * @property string $player_pos
 * @property Carbon $time
 * @property Account $account
 * @property Clan|null $clan
 * @property Territory|null $territory
 * @property Vehicle $vehicle
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|HotwireLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HotwireLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HotwireLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|HotwireLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotwireLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotwireLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotwireLog wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotwireLog whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotwireLog whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotwireLog whereVehicleClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotwireLog whereVehicleId($value)
 * @mixin \Eloquent
 */
class HotwireLog extends Logging
{
	protected $connection = 'portal';
	protected $table = 'hotwire_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'vehicle_id' => 'int',
		'territory_id' => 'int'
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
		return $this->belongsTo(Clan::class)->withTrashed();
	}

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class)->withTrashed();
	}

	public function vehicle(): BelongsTo
	{
		return $this->belongsTo(Vehicle::class)->withTrashed();
	}

    function toString(): string
    {
        return view('logs.entries.hotwire', ['log' => $this])->render();
    }
}
