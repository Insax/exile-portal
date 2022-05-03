<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TerritoryVehicle
 *
 * @property int $id
 * @property int $territory_id
 * @property int $vehicle_count
 * @property Carbon $time
 * @property Territory $territory
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryVehicle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryVehicle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryVehicle query()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryVehicle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryVehicle whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryVehicle whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryVehicle whereVehicleCount($value)
 * @mixin \Eloquent
 */
class TerritoryVehicle extends Model
{
	protected $connection = 'portal';
	protected $table = 'territory_vehicles';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'territory_id' => 'int',
		'vehicle_count' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'territory_id',
		'vehicle_count',
		'time'
	];

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class);
	}
}
