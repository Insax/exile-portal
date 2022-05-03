<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TerritoryBuilder
 *
 * @property int $territory_id
 * @property string $account_uid
 * @property Account $account
 * @property Territory $territory
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryBuilder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryBuilder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryBuilder query()
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryBuilder whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerritoryBuilder whereTerritoryId($value)
 * @mixin \Eloquent
 */
class TerritoryBuilder extends Model
{
	protected $connection = 'portal';
	protected $table = 'territory_builders';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'territory_id' => 'int'
	];

	protected $fillable = [
		'territory_id',
		'account_uid'
	];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class);
	}
}
