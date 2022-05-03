<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingTerritory
 *
 * @property int $id
 * @property string $action
 * @property string $player_id
 * @property string|null $clan_id
 * @property string|null $territory_id
 * @property string|null $fee
 * @property string $poptabs_before
 * @property string $poptabs_after
 * @property string $player_pos
 * @property string|null $target_id
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTerritory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTerritory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTerritory query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTerritory whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTerritory whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTerritory whereFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTerritory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTerritory wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTerritory wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTerritory wherePoptabsAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTerritory wherePoptabsBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTerritory whereTargetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTerritory whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingTerritory whereTime($value)
 * @mixin \Eloquent
 */
class GameServerLoggingTerritory extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_territory';
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
		'fee',
		'poptabs_before',
		'poptabs_after',
		'player_pos',
		'target_id',
		'time'
	];
}
