<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class AccountRespect
 *
 * @property int $id
 * @property string $account_uid
 * @property int $respect
 * @property Carbon $time
 * @property Account $account
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|AccountRespect newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountRespect newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountRespect query()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountRespect whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountRespect whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountRespect whereRespect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountRespect whereTime($value)
 * @mixin \Eloquent
 */
class AccountRespect extends Model
{
	protected $connection = 'portal';
	protected $table = 'account_respects';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'respect' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'account_uid',
		'respect',
		'time'
	];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}
}
