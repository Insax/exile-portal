<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingVg
 *
 * @property int $id
 * @property string $action
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $vehicle_class
 * @property string $vehicle_id
 * @property string $vehicle_pos
 * @property string $nickname
 * @property string $flag_id
 * @property Carbon $time
 *
 * @package App\Models
 */
class GameServerLoggingVg extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_vg';
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
		'vehicle_class',
		'vehicle_id',
		'vehicle_pos',
		'nickname',
		'flag_id',
		'time'
	];
}
