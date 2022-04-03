<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;


/**
 * App\Models\PlayerHistory
 *
 * @property int $id
 * @property string $account_uid
 * @property string $name
 * @property Carbon $died_at
 * @property float $position_x
 * @property float $position_y
 * @property float $position_z
 * @property-read Account $account
 * @method static Builder|PlayerHistory newModelQuery()
 * @method static Builder|PlayerHistory newQuery()
 * @method static Builder|PlayerHistory query()
 * @method static Builder|PlayerHistory whereAccountUid($value)
 * @method static Builder|PlayerHistory whereDiedAt($value)
 * @method static Builder|PlayerHistory whereId($value)
 * @method static Builder|PlayerHistory whereName($value)
 * @method static Builder|PlayerHistory wherePositionX($value)
 * @method static Builder|PlayerHistory wherePositionY($value)
 * @method static Builder|PlayerHistory wherePositionZ($value)
 * @mixin Eloquent
 */
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
