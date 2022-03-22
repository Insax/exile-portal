<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TraderRecycleLog
 *
 * @property int $id
 * @property string|null $playerid
 * @property string|null $item_sold
 * @property int|null $poptabs
 * @property string|null $respect
 * @property int|null $transactionid
 * @property string|null $vehicleclass
 * @property string|null $soldvehicle
 * @property \Illuminate\Support\Carbon $time_sold
 * @method static Builder|TraderRecycleLog newModelQuery()
 * @method static Builder|TraderRecycleLog newQuery()
 * @method static Builder|TraderRecycleLog query()
 * @method static Builder|TraderRecycleLog whereId($value)
 * @method static Builder|TraderRecycleLog whereItemSold($value)
 * @method static Builder|TraderRecycleLog wherePlayerid($value)
 * @method static Builder|TraderRecycleLog wherePoptabs($value)
 * @method static Builder|TraderRecycleLog whereRespect($value)
 * @method static Builder|TraderRecycleLog whereSoldvehicle($value)
 * @method static Builder|TraderRecycleLog whereTimeSold($value)
 * @method static Builder|TraderRecycleLog whereTransactionid($value)
 * @method static Builder|TraderRecycleLog whereVehicleclass($value)
 * @mixin Eloquent
 */
class TraderRecycleLog extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $connection = 'gameserver';
    protected $table = 'trader_recycle_log';
    protected $casts = [
        'id' => 'int',
        'poptabs' => 'int',
        'transactionid' => 'int'
    ];

    protected $dates = [
        'time_sold'
    ];

    protected $fillable = [
        'id',
        'playerid',
        'item_sold',
        'poptabs',
        'respect',
        'transactionid',
        'vehicleclass',
        'soldvehicle',
        'time_sold'
    ];
}
