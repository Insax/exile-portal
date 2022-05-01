<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingSafehacking
 *
 * @property int $id
 * @property string $action
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $territory_id
 * @property string $container_id
 * @property string $player_pos
 * @property string $hack_attempts
 * @property Carbon $time
 *
 * @package App\Models
 */
class GameServerLoggingSafehacking extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_safehacking';
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
		'container_id',
		'player_pos',
		'hack_attempts',
		'time'
	];
}
