<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TerritoryContainerContent
 *
 * @property int $id
 * @property int $portal_instance_id
 * @property int $territory_id
 * @property string $item
 * @property int $count
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryContainerContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryContainerContent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryContainerContent query()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryContainerContent whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryContainerContent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryContainerContent whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryContainerContent wherePortalInstanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryContainerContent whereTerritoryId($value)
 * @mixin \Eloquent
 */
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
