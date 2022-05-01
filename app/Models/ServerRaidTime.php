<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ServerRaidTime
 * 
 * @property int $id
 * @property int $raid_count
 * @property Carbon $time
 *
 * @package App\Models
 */
class ServerRaidTime extends Model
{
	protected $connection = 'portal';
	protected $table = 'server_raid_times';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'raid_count' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'raid_count',
		'time'
	];
}
