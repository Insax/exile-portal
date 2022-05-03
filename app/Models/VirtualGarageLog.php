<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class VirtualGarageLog
 *
 * @property int $id
 * @property string $action
 * @property string $account_uid
 * @property int|null $clan_id
 * @property string $vehicle_class
 * @property int $vehicle_id
 * @property string $vehicle_pos
 * @property string $nickname
 * @property int $territory_id
 * @property Carbon $time
 * @property Account $account
 * @property Clan|null $clan
 * @property Territory $territory
 * @property Vehicle $vehicle
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|VirtualGarageLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VirtualGarageLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VirtualGarageLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|VirtualGarageLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VirtualGarageLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VirtualGarageLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VirtualGarageLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VirtualGarageLog whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VirtualGarageLog whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VirtualGarageLog whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VirtualGarageLog whereVehicleClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VirtualGarageLog whereVehicleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VirtualGarageLog whereVehiclePos($value)
 * @mixin \Eloquent
 */
class VirtualGarageLog extends Model
{
	protected $connection = 'portal';
	protected $table = 'virtual_garage_logs';
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
		return $this->belongsTo(Clan::class);
	}

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class);
	}

	public function vehicle(): BelongsTo
	{
		return $this->belongsTo(Vehicle::class);
	}
}
