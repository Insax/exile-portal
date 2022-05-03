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
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingPoptab newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingPoptab newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingPoptab query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingPoptab whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingPoptab whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingPoptab whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingPoptab whereContainerAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingPoptab whereContainerBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingPoptab whereContainerClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingPoptab whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingPoptab wherePlayerAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingPoptab wherePlayerBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingPoptab wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingPoptab wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingPoptab whereTime($value)
 * @mixin \Eloquent
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
