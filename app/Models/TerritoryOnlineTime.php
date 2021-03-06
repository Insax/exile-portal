<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TerritoryOnlineTime
 *
 * @property int $id
 * @property int $territory_id
 * @property int $online_count
 * @property Carbon $time
 * @property Territory $territory
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryOnlineTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryOnlineTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryOnlineTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryOnlineTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryOnlineTime whereOnlineCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryOnlineTime whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryOnlineTime whereTime($value)
 * @mixin \Eloquent
 */
class TerritoryOnlineTime extends Model
{
	protected $connection = 'portal';
	protected $table = 'territory_online_times';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'territory_id' => 'int',
		'online_count' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'territory_id',
		'online_count',
		'time'
	];

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class);
	}
}
