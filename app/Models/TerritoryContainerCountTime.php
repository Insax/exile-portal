<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TerritoryContainerCountTime
 * 
 * @property int $id
 * @property int $territory_id
 * @property int $container_count
 * @property Carbon $time
 * 
 * @property Territory $territory
 *
 * @package App\Models
 */
class TerritoryContainerCountTime extends Model
{
	protected $connection = 'portal';
	protected $table = 'territory_container_count_times';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'territory_id' => 'int',
		'container_count' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'territory_id',
		'container_count',
		'time'
	];

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class);
	}
}
