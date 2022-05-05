<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class LockerLog
 *
 * @property int $id
 * @property string $action
 * @property string $account_uid
 * @property int|null $clan_id
 * @property int $amount
 * @property int $locker_before
 * @property int $locker_after
 * @property int $player_before
 * @property int $player_after
 * @property Carbon $time
 * @property Account $account
 * @property Clan|null $clan
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|LockerLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LockerLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LockerLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|LockerLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockerLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockerLog whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockerLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockerLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockerLog whereLockerAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockerLog whereLockerBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockerLog wherePlayerAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockerLog wherePlayerBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LockerLog whereTime($value)
 * @mixin \Eloquent
 */
class LockerLog extends Logging
{
	protected $connection = 'portal';
	protected $table = 'locker_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'amount' => 'int',
		'locker_before' => 'int',
		'locker_after' => 'int',
		'player_before' => 'int',
		'player_after' => 'int'
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
		return $this->belongsTo(Clan::class)->withTrashed();
	}

    function toString(): string
    {
        return view('logs.entries.locker', ['log' => $this])->render();
    }
}
