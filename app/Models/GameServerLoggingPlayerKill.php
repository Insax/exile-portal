<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingPlayerKill
 *
 * @property int $id
 * @property string $killer_id
 * @property string|null $killer_clan_id
 * @property string $killer_pos
 * @property string $victim_id
 * @property string|null $victim_clan_id
 * @property string $victim_pos
 * @property Carbon $time
 *
 * @package App\Models
 */
class GameServerLoggingPlayerKill extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_player_kill';
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
		'killer_id',
		'killer_clan_id',
		'killer_pos',
		'victim_id',
		'victim_clan_id',
		'victim_pos',
		'time'
	];
}
