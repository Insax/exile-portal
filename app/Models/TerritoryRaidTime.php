<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TerritoryRaidTime
 *
 * @property int $id
 * @property int $territory_id
 * @property bool $raid_mode
 * @property Carbon $time
 * @property Territory $territory
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryRaidTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryRaidTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryRaidTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryRaidTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryRaidTime whereRaidMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryRaidTime whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryRaidTime whereTime($value)
 * @mixin \Eloquent
 */
class TerritoryRaidTime extends Model
{
	protected $connection = 'portal';
	protected $table = 'territory_raid_times';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'territory_id' => 'int',
		'raid_mode' => 'bool'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'territory_id',
		'raid_mode',
		'time'
	];

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class);
	}
}
