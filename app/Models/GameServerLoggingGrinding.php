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
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGrinding newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGrinding newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGrinding query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGrinding whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGrinding whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGrinding whereConstructionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGrinding whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGrinding wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGrinding wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGrinding whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGrinding whereTime($value)
 * @mixin \Eloquent
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
