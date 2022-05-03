<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class SafeHackingLog
 *
 * @property int $id
 * @property string $action
 * @property string $account_uid
 * @property int|null $clan_id
 * @property int $territory_id
 * @property int $container_id
 * @property string $player_pos
 * @property int $hack_attempts
 * @property Carbon $time
 * @property Account $account
 * @property Clan|null $clan
 * @property Container $container
 * @property Territory $territory
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|SafeHackingLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SafeHackingLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SafeHackingLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|SafeHackingLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeHackingLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeHackingLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeHackingLog whereContainerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeHackingLog whereHackAttempts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeHackingLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeHackingLog wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeHackingLog whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SafeHackingLog whereTime($value)
 * @mixin \Eloquent
 */
class SafeHackingLog extends Model
{
	protected $connection = 'portal';
	protected $table = 'safe_hacking_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'territory_id' => 'int',
		'container_id' => 'int',
		'hack_attempts' => 'int'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}

	public function clan(): BelongsTo
	{
		return $this->belongsTo(Clan::class);
	}

	public function container(): BelongsTo
	{
		return $this->belongsTo(Container::class);
	}

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class);
	}
}
