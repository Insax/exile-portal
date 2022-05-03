<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingDisconnectPosition
 *
 * @property int $id
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $player_pos
 * @property string $player_is_alive
 * @property string|null $territory_id
 * @property string|null $build_rights
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingDisconnectPosition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingDisconnectPosition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingDisconnectPosition query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingDisconnectPosition whereBuildRights($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingDisconnectPosition whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingDisconnectPosition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingDisconnectPosition wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingDisconnectPosition wherePlayerIsAlive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingDisconnectPosition wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingDisconnectPosition whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingDisconnectPosition whereTime($value)
 * @mixin \Eloquent
 */
class GameServerLoggingDisconnectPosition extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_disconnect_position';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];
}
