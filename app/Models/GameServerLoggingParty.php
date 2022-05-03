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
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingParty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingParty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingParty query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingParty whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingParty whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingParty whereGroupName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingParty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingParty whereInvitedPlayerClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingParty whereInvitedPlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingParty wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingParty whereTime($value)
 * @mixin \Eloquent
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
