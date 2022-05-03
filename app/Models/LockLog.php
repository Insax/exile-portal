<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class LockLog
 *
 * @property int $id
 * @property string $action
 * @property string $account_uid
 * @property int|null $clan_id
 * @property string $lockable_type
 * @property int $lockable_id
 * @property string $pin_code
 * @property string $player_pos
 * @property int|null $territory_id
 * @property bool|null $build_rights
 * @property Carbon $time
 * @property Account $account
 * @property Clan|null $clan
 * @property Territory|null $territory
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|LockLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LockLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LockLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|LockLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockLog whereBuildRights($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockLog whereLockableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockLog whereLockableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockLog wherePinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockLog wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockLog whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockLog whereTime($value)
 * @mixin \Eloquent
 */
class LockLog extends Model
{
	protected $connection = 'portal';
	protected $table = 'lock_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'lockable_id' => 'int',
		'territory_id' => 'int',
		'build_rights' => 'bool'
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

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class);
	}
}
