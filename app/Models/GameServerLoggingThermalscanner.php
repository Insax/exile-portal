<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingThermalscanner
 *
 * @property int $id
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $object_id
 * @property string $object_type
 * @property string $pin_code
 * @property string $player_pos
 * @property string|null $territory_id
 * @property string|null $has_rights
 * @property Carbon $time
 *
 * @package App\Models
 */
class GameServerLoggingThermalscanner extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_thermalscanner';
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
		'object_id',
		'object_type',
		'pin_code',
		'player_pos',
		'territory_id',
		'has_rights',
		'time'
	];
}
