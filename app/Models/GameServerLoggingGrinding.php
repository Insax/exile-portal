<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingGrinding
 *
 * @property int $id
 * @property string $action
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $territory_id
 * @property string $player_pos
 * @property string $construction_id
 * @property Carbon $time
 *
 * @package App\Models
 */
class GameServerLoggingGrinding extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_grinding';
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
		'construction_id',
		'time'
	];
}
