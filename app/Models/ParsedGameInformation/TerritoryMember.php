<?php

namespace App\Models\ParsedGameInformation;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TerritoryMember
 *
 * @property int $territory_id
 * @property string $account_uid
 * @method static Builder|TerritoryMember newModelQuery()
 * @method static Builder|TerritoryMember newQuery()
 * @method static Builder|TerritoryMember query()
 * @method static Builder|TerritoryMember whereAccountUid($value)
 * @method static Builder|TerritoryMember whereTerritoryId($value)
 * @mixin Eloquent
 */
class TerritoryMember extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $connection = 'gameserver';
    protected $fillable = [
        'account_uid',
        'territory_id'
    ];
}
