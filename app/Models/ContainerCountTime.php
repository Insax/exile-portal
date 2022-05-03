<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ContainerCountTime
 *
 * @property int $id
 * @property int $container_count
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ContainerCountTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContainerCountTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContainerCountTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContainerCountTime whereContainerCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContainerCountTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContainerCountTime whereTime($value)
 * @mixin \Eloquent
 */
class ContainerCountTime extends Model
{
	protected $connection = 'portal';
	protected $table = 'container_count_times';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'container_count' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'container_count',
		'time'
	];
}
