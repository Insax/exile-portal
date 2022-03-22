<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TerritoryMember
 *
 * @property int $territory_id
 * @property string $account_uid
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryMember whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryMember whereTerritoryId($value)
 * @mixin \Eloquent
 */
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
