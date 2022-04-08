<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ParsedPlayerMoney
 *
 * @method static Builder|PlayerMoney newModelQuery()
 * @method static Builder|PlayerMoney newQuery()
 * @method static Builder|PlayerMoney query()
 * @mixin Eloquent
 */
class PlayerMoney extends Model
{
    use HasFactory;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The connection name for the model.
     *
     * @var string|null
     */
    protected $connection = 'portal';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'player_money';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int',
        'portal_instance_id' => 'int',
        'locker_money' => 'int',
        'marxet_money' => 'int',
        'container_money' => 'int'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'portal_instance_id',
        'locker_money',
        'marxet_money',
        'container_money'
    ];
}
