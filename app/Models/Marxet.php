<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
