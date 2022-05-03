<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class DisconnectPositionLog
 *
 * @property int $id
 * @property string $account_uid
 * @property int|null $clan_id
 * @property string $player_pos
 * @property bool $player_is_alive
 * @property int|null $territory_id
 * @property bool|null $build_rights
 * @property Carbon $time
 * @property Account $account
 * @property Clan|null $clan
 * @property Territory|null $territory
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|DisconnectPositionLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisconnectPositionLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisconnectPositionLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|DisconnectPositionLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisconnectPositionLog whereBuildRights($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisconnectPositionLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisconnectPositionLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisconnectPositionLog wherePlayerIsAlive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisconnectPositionLog wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisconnectPositionLog whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisconnectPositionLog whereTime($value)
 * @mixin \Eloquent
 */
class DisconnectPositionLog extends Model
{
	protected $connection = 'portal';
	protected $table = 'disconnect_position_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'player_is_alive' => 'bool',
		'territory_id' => 'int',
		'build_rights' => 'bool'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'account_uid',
		'clan_id',
		'player_pos',
		'player_is_alive',
		'territory_id',
		'build_rights',
		'time'
	];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}

	public function clan(): BelongsTo
	{
		return $this->belongsTo(Clan::class);
	}

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class);
	}
}
