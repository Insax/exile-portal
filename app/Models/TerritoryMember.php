<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerritoryMember extends Model
{
    use HasFactory;

    protected $connection = 'gameserver';

    protected $fillable = [
        'account_uid',
        'territory_id'
    ];

    public $timestamps = false;
}
