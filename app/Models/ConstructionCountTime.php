<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ConstructionCountTime
 *
 * @property int $id
 * @property int $construction_count
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ConstructionCountTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConstructionCountTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConstructionCountTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConstructionCountTime whereConstructionCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConstructionCountTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConstructionCountTime whereTime($value)
 * @mixin \Eloquent
 */
class ConstructionCountTime extends Model
{
	protected $connection = 'portal';
	protected $table = 'construction_count_times';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'construction_count' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'construction_count',
		'time'
	];
}
