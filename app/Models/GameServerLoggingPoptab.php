<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingPoptab
 *
 * @property int $id
 * @property string $action
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $amount
 * @property string $container_class
 * @property string $container_before
 * @property string $container_after
 * @property string $player_before
 * @property string $player_after
 * @property string $player_pos
 * @property Carbon $time
 *
 * @package App\Models
 */
class GameServerLoggingPoptab extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_poptab';
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
		'amount',
		'container_class',
		'container_before',
		'container_after',
		'player_before',
		'player_after',
		'player_pos',
		'time'
	];
}
