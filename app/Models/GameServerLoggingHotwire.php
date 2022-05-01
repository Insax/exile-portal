<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingHotwire
 *
 * @property int $id
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $vehicle_class
 * @property string $vehicle_id
 * @property string|null $territory_id
 * @property string $player_pos
 * @property Carbon $time
 *
 * @package App\Models
 */
class GameServerLoggingHotwire extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_hotwire';
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
		'vehicle_class',
		'vehicle_id',
		'territory_id',
		'player_pos',
		'time'
	];
}
