<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Construction extends Model
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
    protected $table = 'construction';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'position_x' => 'float',
        'position_y' => 'float',
        'position_z' => 'float',
        'direction_x' => 'float',
        'direction_y' => 'float',
        'direction_z' => 'float',
        'up_x' => 'float',
        'up_y' => 'float',
        'up_z' => 'float',
        'is_locked' => 'bool',
        'damage' => 'int',
        'territory_id' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @deprecated Use the "casts" property
     *
     * @var array
     */
    protected $dates = [
        'spawned_at',
        'last_updated_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'class',
        'account_uid',
        'spawned_at',
        'position_x',
        'position_y',
        'position_z',
        'direction_x',
        'direction_y',
        'direction_z',
        'up_x',
        'up_y',
        'up_z',
        'is_locked',
        'pin_code',
        'damage',
        'territory_id',
        'last_updated_at',
        'construction_texture',
        'construction_name'
    ];

    /**
     * Relationship - Construction and Account
     *
     * N constructions belong to one Player.
     *
     * @return BelongsTo
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_uid');
    }
}
