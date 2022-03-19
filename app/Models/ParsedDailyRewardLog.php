<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParsedDailyRewardLog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'portal_instance_id',
        'account_uid',
        'reward',
        'time'
    ];
}
