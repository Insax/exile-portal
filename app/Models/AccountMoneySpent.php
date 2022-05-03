<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class AccountMoneySpent
 *
 * @property int $id
 * @property string $account_uid
 * @property int $amount
 * @property Carbon $time
 * @property Account $account
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|AccountMoneySpent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountMoneySpent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountMoneySpent query()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountMoneySpent whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountMoneySpent whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountMoneySpent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountMoneySpent whereTime($value)
 * @mixin \Eloquent
 */
class AccountMoneySpent extends Model
{
	protected $connection = 'portal';
	protected $table = 'account_money_spents';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'amount' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'account_uid',
		'amount',
		'time'
	];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}
}
