<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class AccountOnlineTime
 * 
 * @property int $id
 * @property string $account_uid
 * @property bool $online
 * @property Carbon $time
 * 
 * @property Account $account
 *
 * @package App\Models
 */
class AccountOnlineTime extends Model
{
	protected $connection = 'portal';
	protected $table = 'account_online_times';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'online' => 'bool'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'account_uid',
		'online',
		'time'
	];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}
}
