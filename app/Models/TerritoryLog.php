<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TerritoryLog
 *
 * @property int $id
 * @property string $action
 * @property string $account_uid
 * @property int|null $clan_id
 * @property int|null $territory_id
 * @property int|null $fee
 * @property int $poptabs_before
 * @property int $poptabs_after
 * @property string $player_pos
 * @property string|null $target_account_uid
 * @property Carbon $time
 * @property Account|null $account
 * @property Clan|null $clan
 * @property Territory|null $territory
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryLog whereFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryLog wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryLog wherePoptabsAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryLog wherePoptabsBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryLog whereTargetAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryLog whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryLog whereTime($value)
 * @mixin \Eloquent
 */
class TerritoryLog extends Model
{
	protected $connection = 'portal';
	protected $table = 'territory_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'territory_id' => 'int',
		'fee' => 'int',
		'poptabs_before' => 'int',
		'poptabs_after' => 'int'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'target_account_uid');
	}

	public function clan(): BelongsTo
	{
		return $this->belongsTo(Clan::class);
	}

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class);
	}
}
