<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class HackLog
 *
 * @property int $id
 * @property string $action
 * @property string $new_account_uid
 * @property string $old_account_uid
 * @property Carbon $time
 * @property Account $account
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|HackLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HackLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HackLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|HackLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HackLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HackLog whereNewAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HackLog whereOldAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HackLog whereTime($value)
 * @mixin \Eloquent
 */
class HackLog extends Model
{
	protected $connection = 'portal';
	protected $table = 'hack_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'old_account_uid');
	}
}
