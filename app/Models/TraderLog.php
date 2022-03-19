<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TraderLog
 *
 * @property int $id
 * @property string|null $playerid
 * @property string|null $item_sold
 * @property int|null $poptabs
 * @property string|null $respect
 * @property Carbon $time_sold
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|TraderLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TraderLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TraderLog query()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|TraderLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TraderLog whereItemSold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TraderLog wherePlayerid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TraderLog wherePoptabs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TraderLog whereRespect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TraderLog whereTimeSold($value)
 */
class TraderLog extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $connection = 'gameserver';
    protected $table = 'trader_log';
    protected $casts = [
        'id' => 'int',
        'poptabs' => 'int'
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
        'time_sold'
    ];
}
