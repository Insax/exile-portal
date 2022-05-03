<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class FamilyLog
 *
 * @property int $id
 * @property string $action
 * @property int|null $clan_id
 * @property string $source_account_uid
 * @property string|null $target_account_uid
 * @property Carbon $time
 * @property Clan|null $clan
 * @property Account|null $account
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyLog whereSourceAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyLog whereTargetAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyLog whereTime($value)
 * @mixin \Eloquent
 */
class FamilyLog extends Model
{
	protected $connection = 'portal';
	protected $table = 'family_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];

	public function clan(): BelongsTo
	{
		return $this->belongsTo(Clan::class);
	}

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'target_account_uid');
	}
}
