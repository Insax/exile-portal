<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingSafezone
 *
 * @property int $id
 * @property string $action
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $vehicle
 * @property string|null $vehicle_id
 * @property string $player_pos
 * @property string $vehicle_pos
 * @property string|null $vehicle_owner
 * @property string|null $vehicle_owner_clan_id
 * @property Carbon $time
 *
 * @package App\Models
 */
class GameServerLoggingSafezone extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_safezone';
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
		'vehicle',
		'vehicle_id',
		'player_pos',
		'vehicle_pos',
		'vehicle_owner',
		'vehicle_owner_clan_id',
		'time'
	];
}
