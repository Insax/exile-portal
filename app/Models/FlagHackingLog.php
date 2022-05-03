<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class FlagHackingLog
 *
 * @property int $id
 * @property string $action
 * @property string $account_uid
 * @property int|null $clan_id
 * @property int $territory_id
 * @property string $player_pos
 * @property int $attempts
 * @property string|null $reward_vehicle_class
 * @property Carbon $time
 * @property Account $account
 * @property Clan|null $clan
 * @property Territory $territory
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|FlagHackingLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlagHackingLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlagHackingLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|FlagHackingLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlagHackingLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlagHackingLog whereAttempts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlagHackingLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlagHackingLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlagHackingLog wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlagHackingLog whereRewardVehicleClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlagHackingLog whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlagHackingLog whereTime($value)
 * @mixin \Eloquent
 */
class FlagHackingLog extends Model
{
	protected $connection = 'portal';
	protected $table = 'flag_hacking_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'territory_id' => 'int',
		'attempts' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'action',
		'account_uid',
		'clan_id',
		'territory_id',
		'player_pos',
		'attempts',
		'reward_vehicle_class',
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
