<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\InfistarLog
 *
 * @property int $id
 * @property string|null $servername
 * @property string|null $logname
 * @property string|null $logentry
 * @property \Illuminate\Support\Carbon $time
 * @method static \Illuminate\Database\Eloquent\Builder|InfistarLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InfistarLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InfistarLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|InfistarLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfistarLog whereLogentry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfistarLog whereLogname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfistarLog whereServername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfistarLog whereTime($value)
 * @mixin \Eloquent
 */
class InfistarLog extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The connection name for the model.
     *
     * @var string|null
     */
    protected $connection = 'gameserver';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'infistar_logs';

    /**
     * The attributes that should be mutated to dates.
     *
     * @deprecated Use the "casts" property
     *
     * @var array
     */
    protected $dates = [
        'time'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'servername',
        'logname',
        'logentry',
        'time'
    ];
}
