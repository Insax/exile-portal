<?php

namespace App\Models\Game;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Marxet
 *
 * @property string $listingID
 * @property bool $itemAvailable
 * @property string $itemArray
 * @property float $price
 * @property string $sellerUID
 * @property string $created_at
 * @method static Builder|Marxet newModelQuery()
 * @method static Builder|Marxet newQuery()
 * @method static Builder|Marxet query()
 * @method static Builder|Marxet whereCreatedAt($value)
 * @method static Builder|Marxet whereItemArray($value)
 * @method static Builder|Marxet whereItemAvailable($value)
 * @method static Builder|Marxet whereListingID($value)
 * @method static Builder|Marxet wherePrice($value)
 * @method static Builder|Marxet whereSellerUID($value)
 * @mixin Eloquent
 */
class Marxet extends Model
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
    protected $table = 'marxet';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'listingID';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'itemAvailable' => 'bool',
        'price' => 'float'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'itemAvailable',
        'itemArray',
        'price',
        'sellerUID'
    ];
}
