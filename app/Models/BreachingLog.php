<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class BreachingLog
 *
 * @property int $id
 * @property string $account_uid
 * @property int|null $clan_id
 * @property string $action
 * @property int|null $construction_id
 * @property int|null $territory_id
 * @property string $position
 * @property string $charge_class
 * @property Carbon $time
 * @property Account $account
 * @property Clan|null $clan
 * @property Construction|null $construction
 * @property Territory|null $territory
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|BreachingLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BreachingLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BreachingLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|BreachingLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BreachingLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BreachingLog whereChargeClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BreachingLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BreachingLog whereConstructionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BreachingLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BreachingLog wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BreachingLog whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BreachingLog whereTime($value)
 * @mixin \Eloquent
 */
class BreachingLog extends Model
{
	protected $connection = 'portal';
	protected $table = 'breaching_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'construction_id' => 'int',
		'territory_id' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'account_uid',
		'clan_id',
		'action',
		'construction_id',
		'territory_id',
		'position',
		'charge_class',
		'time'
	];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}

	public function clan(): BelongsTo
	{
		return $this->belongsTo(Clan::class);
	}

	public function construction(): BelongsTo
	{
		return $this->belongsTo(Construction::class);
	}

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class);
	}
}
