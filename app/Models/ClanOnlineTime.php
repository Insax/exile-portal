<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ClanOnlineTime
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ClanOnlineTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClanOnlineTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClanOnlineTime query()
 * @mixin \Eloquent
 */
class ClanOnlineTime extends Model
{
    protected $connection = 'portal';
    use HasFactory;
}
