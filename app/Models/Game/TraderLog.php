<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Game;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\TraderLog
 *
 * @property int $id
 * @property string|null $playerid
 * @property string|null $item_sold
 * @property int|null $poptabs
 * @property string|null $respect
 * @property Carbon $time_sold
 * @method static Builder|TraderLog newModelQuery()
 * @method static Builder|TraderLog newQuery()
 * @method static Builder|TraderLog query()
 * @method static Builder|TraderLog whereId($value)
 * @method static Builder|TraderLog whereItemSold($value)
 * @method static Builder|TraderLog wherePlayerid($value)
 * @method static Builder|TraderLog wherePoptabs($value)
 * @method static Builder|TraderLog whereRespect($value)
 * @method static Builder|TraderLog whereTimeSold($value)
 * @mixin Eloquent
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
