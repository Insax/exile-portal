<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingDisconnectPosition
 *
 * @property int $id
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $player_pos
 * @property string $player_is_alive
 * @property string|null $territory_id
 * @property string|null $build_rights
 * @property Carbon $time
 *
 * @package App\Models
 */
class GameServerLoggingDisconnectPosition extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_disconnect_position';
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
		'clan_id',
		'player_pos',
		'player_is_alive',
		'territory_id',
		'build_rights',
		'time'
	];
}
