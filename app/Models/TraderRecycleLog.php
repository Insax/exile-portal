<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
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
 * @method static \Illuminate\Database\Eloquent\Builder|TraderRecycleLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TraderRecycleLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TraderRecycleLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|TraderRecycleLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TraderRecycleLog whereItemSold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TraderRecycleLog wherePlayerid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TraderRecycleLog wherePoptabs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TraderRecycleLog whereRespect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TraderRecycleLog whereSoldvehicle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TraderRecycleLog whereTimeSold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TraderRecycleLog whereTransactionid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TraderRecycleLog whereVehicleclass($value)
 * @mixin \Eloquent
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
