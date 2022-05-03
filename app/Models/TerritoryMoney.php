<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TerritoryMoney
 *
 * @property int $id
 * @property int $territory_id
 * @property int $money
 * @property Carbon $time
 * @property Territory $territory
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryMoney newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryMoney newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryMoney query()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryMoney whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryMoney whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryMoney whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryMoney whereTime($value)
 * @mixin \Eloquent
 */
class TerritoryMoney extends Model
{
	protected $connection = 'portal';
	protected $table = 'territory_money';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'territory_id' => 'int',
		'money' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'territory_id',
		'money',
		'time'
	];

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class);
	}
}
