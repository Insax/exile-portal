<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
