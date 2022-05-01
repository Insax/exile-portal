<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingBreaching
 *
 * @property int $id
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $action
 * @property string $construction_id
 * @property string $territory_id
 * @property string $position
 * @property string $charge_class
 * @property Carbon $time
 *
 * @package App\Models
 */
class GameServerLoggingBreaching extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_breaching';
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
		'action',
		'construction_id',
		'territory_id',
		'position',
		'charge_class',
		'time'
	];
}
