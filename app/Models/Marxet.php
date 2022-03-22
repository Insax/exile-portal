<?php

namespace App\Models;

use Carbon\Carbon;
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
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet whereItemArray($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet whereItemAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet whereListingID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet whereSellerUID($value)
 * @mixin \Eloquent
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
