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
 *
 * @package App\Models
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
