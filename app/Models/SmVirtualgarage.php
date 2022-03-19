<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmVirtualgarage extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $connection = 'gameserver';
    protected $table = 'sm_virtualgarage';
    protected $casts = [
        'fuel' => 'float'
    ];

    protected $fillable = [
        'class',
        'puid',
        'owner_uid',
        'textures',
        'poptabs',
        'pincode',
        'damage',
        'hitpoints',
        'fuel',
        'items',
        'magazines',
        'weapons',
        'cargo'
    ];
}
