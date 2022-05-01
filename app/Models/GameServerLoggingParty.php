<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingParty
 *
 * @property int $id
 * @property string $action
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $invited_player_id
 * @property string|null $invited_player_clan_id
 * @property string $group_name
 * @property Carbon $time
 *
 * @package App\Models
 */
class GameServerLoggingParty extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_party';
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
		'invited_player_id',
		'invited_player_clan_id',
		'group_name',
		'time'
	];
}
