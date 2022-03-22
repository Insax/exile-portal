<?php

namespace App\Models\ParsedGameInformation;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
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
 * @method static Builder|TerritoryContainerContent newModelQuery()
 * @method static Builder|TerritoryContainerContent newQuery()
 * @method static Builder|TerritoryContainerContent query()
 * @method static Builder|TerritoryContainerContent whereCount($value)
 * @method static Builder|TerritoryContainerContent whereId($value)
 * @method static Builder|TerritoryContainerContent whereItem($value)
 * @method static Builder|TerritoryContainerContent wherePortalInstanceId($value)
 * @method static Builder|TerritoryContainerContent whereTerritoryId($value)
 * @mixin Eloquent
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
