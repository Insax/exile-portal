<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TerritoryItemCountTime
 * 
 * @property int $id
 * @property int $territory_id
 * @property int $item_count
 * @property Carbon $time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Territory $territory
 *
 * @package App\Models
 */
class TerritoryItemCountTime extends Model
{
	protected $connection = 'portal';
	protected $table = 'territory_item_count_times';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'territory_id' => 'int',
		'item_count' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'territory_id',
		'item_count',
		'time'
	];

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class);
	}
}
