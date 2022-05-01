<?php

namespace App\Models;

use App\Interfaces\LoggableString;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class Logging extends Model implements LoggableString
{
    protected $connection = 'portal';
    public $incrementing = false;
    public $timestamps = false;
    public static $snakeAttributes = false;

    protected $guarded = [];

    abstract function toString() : string;
}
