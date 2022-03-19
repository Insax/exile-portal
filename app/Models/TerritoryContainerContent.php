<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerritoryContainerContent extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $connection = 'portal';

    protected $fillable = [
        'portal_instance_id',
        'territory_id',
        'item',
        'count'
    ];
}
