<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingContainerPack
 *
 * @property int $id
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $container_id
 * @property string $container_pos
 * @property string $territory_id
 * @property string $build_rights
 * @property Carbon $time
 *
 * @package App\Models
 */
class GameServerLoggingContainerPack extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_container_pack';
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
		'container_id',
		'container_pos',
		'territory_id',
		'build_rights',
		'time'
	];
}
