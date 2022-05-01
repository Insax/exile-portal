<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class AccountMoney
 * 
 * @property int $id
 * @property string $account_uid
 * @property int $money
 * @property Carbon $time
 * 
 * @property Account $account
 *
 * @package App\Models
 */
class AccountMoney extends Model
{
	protected $connection = 'portal';
	protected $table = 'account_money';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'money' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'account_uid',
		'money',
		'time'
	];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}
}
