<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingAntiTp
 *
 * @property int $id
 * @property string $player_id
 * @property string|null $class
 * @property string $distance
 * @property string $old_pos
 * @property string $new_pos
 * @property string $tp_count
 * @property Carbon $time
 *
 * @package App\Models
 */
class GameServerLoggingAntiTp extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_anti_tp';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'id',
		'player_id',
		'class',
		'distance',
		'old_pos',
		'new_pos',
		'tp_count',
		'time'
	];
}
