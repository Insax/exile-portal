<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class LoadoutTraderLog
 *
 * @property int $id
 * @property string $account_uid
 * @property int|null $clan_id
 * @property string $loadout
 * @property int $price
 * @property Carbon $time
 * @property Account $account
 * @property Clan|null $clan
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|LoadoutTraderLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoadoutTraderLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoadoutTraderLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|LoadoutTraderLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoadoutTraderLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoadoutTraderLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoadoutTraderLog whereLoadout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoadoutTraderLog wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoadoutTraderLog whereTime($value)
 * @mixin \Eloquent
 */
class LoadoutTraderLog extends Logging
{
	protected $connection = 'portal';
	protected $table = 'loadout_trader_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'price' => 'int'
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
        return view('logs.entries.loadout', ['log' => $this])->render();
    }
}
