<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingFlaghacking
 *
 * @property int $id
 * @property string $action
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $territory_id
 * @property string $player_pos
 * @property string $attempts
 * @property string|null $reward_vehicle_class
 * @property Carbon $time
 *
 * @package App\Models
 */
class GameServerLoggingFlaghacking extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_flaghacking';
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
		'action',
		'player_id',
		'clan_id',
		'territory_id',
		'player_pos',
		'attempts',
		'reward_vehicle_class',
		'time'
	];
}
