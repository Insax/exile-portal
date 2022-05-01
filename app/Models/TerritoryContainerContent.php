<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TerritoryContainerContent
 * 
 * @property int $id
 * @property int $territory_id
 * @property string $item
 * @property int $count
 * 
 * @property Territory $territory
 *
 * @package App\Models
 */
class TerritoryContainerContent extends Model
{
	protected $connection = 'portal';
	protected $table = 'territory_container_contents';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'territory_id' => 'int',
		'count' => 'int'
	];

	protected $fillable = [
		'territory_id',
		'item',
		'count'
	];

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class);
	}
}
