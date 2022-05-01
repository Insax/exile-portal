<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingLoadoutTrader
 *
 * @property int $id
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $loadout
 * @property string $price
 * @property Carbon $time
 *
 * @package App\Models
 */
class GameServerLoggingLoadoutTrader extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_loadout_trader';
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
		'loadout',
		'price',
		'time'
	];
}
