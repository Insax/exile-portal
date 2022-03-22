<?php

namespace App\Models\Game;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\InfistarLog
 *
 * @property int $id
 * @property string|null $servername
 * @property string|null $logname
 * @property string|null $logentry
 * @property Carbon $time
 * @method static Builder|InfistarLog newModelQuery()
 * @method static Builder|InfistarLog newQuery()
 * @method static Builder|InfistarLog query()
 * @method static Builder|InfistarLog whereId($value)
 * @method static Builder|InfistarLog whereLogentry($value)
 * @method static Builder|InfistarLog whereLogname($value)
 * @method static Builder|InfistarLog whereServername($value)
 * @method static Builder|InfistarLog whereTime($value)
 * @mixin Eloquent
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
