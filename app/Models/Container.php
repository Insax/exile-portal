<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Container extends Model
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
    protected $table = 'container';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_locked' => 'bool',
        'position_x' => 'float',
        'position_y' => 'float',
        'position_z' => 'float',
        'direction_x' => 'float',
        'direction_y' => 'float',
        'direction_z' => 'float',
        'up_x' => 'float',
        'up_y' => 'float',
        'up_z' => 'float',
        'territory_id' => 'int',
        'money' => 'int'
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
        'last_updated_at',
        'abandoned'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'class',
        'spawned_at',
        'account_uid',
        'is_locked',
        'position_x',
        'position_y',
        'position_z',
        'direction_x',
        'direction_y',
        'direction_z',
        'up_x',
        'up_y',
        'up_z',
        'cargo_items',
        'cargo_magazines',
        'cargo_weapons',
        'cargo_container',
        'last_updated_at',
        'pin_code',
        'territory_id',
        'money',
        'abandoned',
        'inventory'
    ];

    /**
     * Relationship - Container and Account
     *
     * N Container belong to 1 Account.
     *
     * @return BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_uid');
    }
}
