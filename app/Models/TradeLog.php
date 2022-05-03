<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TradeLog
 *
 * @property int $id
 * @property string $action
 * @property string $account_uid
 * @property int|null $clan_id
 * @property string|null $item_class
 * @property int|null $quantity
 * @property int|null $vehicle_id
 * @property string|null $container_content
 * @property int|null $price
 * @property int|null $sell_respect
 * @property int $poptabs_after
 * @property int $respect_after
 * @property Carbon $time
 * @property Account $account
 * @property Vehicle|null $vehicle
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|TradeLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TradeLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TradeLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|TradeLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeLog whereContainerContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeLog whereItemClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeLog wherePoptabsAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeLog wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeLog whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeLog whereRespectAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeLog whereSellRespect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeLog whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeLog whereVehicleId($value)
 * @mixin \Eloquent
 */
class TradeLog extends Model
{
	protected $connection = 'portal';
	protected $table = 'trade_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'quantity' => 'int',
		'vehicle_id' => 'int',
		'price' => 'int',
		'sell_respect' => 'int',
		'poptabs_after' => 'int',
		'respect_after' => 'int'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}

	public function vehicle(): BelongsTo
	{
		return $this->belongsTo(Vehicle::class);
	}
}
