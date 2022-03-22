<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\PlayerStat
 *
 * @property int $id
 * @property Account|null $killer
 * @property Account|null $victim
 * @property string|null $weaponused
 * @property int|null $distance
 * @property int|null $bambikill
 * @property int|null $raidkill
 * @property int|null $territorykill
 * @property string $killer_position
 * @property string $victim_position
 * @property \Illuminate\Support\Carbon|null $time
 * @method static Builder|PlayerStat newModelQuery()
 * @method static Builder|PlayerStat newQuery()
 * @method static Builder|PlayerStat query()
 * @method static Builder|PlayerStat whereBambikill($value)
 * @method static Builder|PlayerStat whereDistance($value)
 * @method static Builder|PlayerStat whereId($value)
 * @method static Builder|PlayerStat whereKiller($value)
 * @method static Builder|PlayerStat whereKillerPosition($value)
 * @method static Builder|PlayerStat whereRaidkill($value)
 * @method static Builder|PlayerStat whereTerritorykill($value)
 * @method static Builder|PlayerStat whereTime($value)
 * @method static Builder|PlayerStat whereVictim($value)
 * @method static Builder|PlayerStat whereVictimPosition($value)
 * @method static Builder|PlayerStat whereWeaponused($value)
 * @mixin Eloquent
 */
class PlayerStat extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

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
    protected $table = 'player_stats';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int',
        'distance' => 'int',
        'bambikill' => 'int',
        'raidkill' => 'int',
        'territorykill' => 'int'
    ];

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
        'id',
        'killer',
        'victim',
        'weaponused',
        'distance',
        'bambikill',
        'raidkill',
        'territorykill',
        'killer_position',
        'victim_position',
        'time'
    ];

    /**
     * Relationship - PlayerStat and Account
     *
     * N PlayerStat belong to 1 Account.
     *
     * @return BelongsTo
     */
    public function killer(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'killer', 'uid');
    }

    /**
     * Relationship - PlayerStat and Account
     *
     * N PlayerStat belong to 1 Account.
     *
     * @return BelongsTo
     */
    public function victim(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'victim', 'uid');
    }
}
