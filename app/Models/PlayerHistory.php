<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class PlayerHistory extends Model
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
    protected $table = 'player_history';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'position_x' => 'float',
        'position_y' => 'float',
        'position_z' => 'float'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @deprecated Use the "casts" property
     *
     * @var array
     */
    protected $dates = [
        'died_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'account_uid',
        'name',
        'died_at',
        'position_x',
        'position_y',
        'position_z'
    ];

    /**
     * Relationship - PlayerHistory and Account
     *
     * N PlayerHistory belong to 1 Account
     *
     * @return BelongsTo
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_uid', 'uid');
    }
}
