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
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ServerRaidTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServerRaidTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServerRaidTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServerRaidTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServerRaidTime whereRaidCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServerRaidTime whereTime($value)
 * @mixin \Eloquent
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
