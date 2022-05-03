<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class GrindingLog
 *
 * @property int $id
 * @property string $action
 * @property string $account_uid
 * @property int|null $clan_id
 * @property int $territory_id
 * @property string $player_pos
 * @property int $construction_id
 * @property Carbon $time
 * @property Account $account
 * @property Clan|null $clan
 * @property Construction $construction
 * @property Territory $territory
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GrindingLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GrindingLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GrindingLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|GrindingLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrindingLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrindingLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrindingLog whereConstructionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrindingLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrindingLog wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrindingLog whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrindingLog whereTime($value)
 * @mixin \Eloquent
 */
class GrindingLog extends Model
{
	protected $connection = 'portal';
	protected $table = 'grinding_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'territory_id' => 'int',
		'construction_id' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'action',
		'account_uid',
		'clan_id',
		'territory_id',
		'player_pos',
		'construction_id',
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
