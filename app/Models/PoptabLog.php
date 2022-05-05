<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class PoptabLog
 *
 * @property int $id
 * @property string $action
 * @property string $account_uid
 * @property int|null $clan_id
 * @property int $amount
 * @property string $container_class
 * @property int $container_before
 * @property int $container_after
 * @property int $player_before
 * @property int $player_after
 * @property string $player_pos
 * @property Carbon $time
 * @property Account $account
 * @property Clan|null $clan
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|PoptabLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PoptabLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PoptabLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|PoptabLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PoptabLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PoptabLog whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PoptabLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PoptabLog whereContainerAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PoptabLog whereContainerBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PoptabLog whereContainerClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PoptabLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PoptabLog wherePlayerAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PoptabLog wherePlayerBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PoptabLog wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PoptabLog whereTime($value)
 * @mixin \Eloquent
 */
class PoptabLog extends Logging
{
	protected $connection = 'portal';
	protected $table = 'poptab_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'amount' => 'int',
		'container_before' => 'int',
		'container_after' => 'int',
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
		return $this->belongsTo(Clan::class);
	}

    function toString(): string
    {
        return '';
    }
}
