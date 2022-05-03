<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class CraftingLog
 *
 * @property int $id
 * @property string $account_uid
 * @property int|null $clan_id
 * @property string $player_pos
 * @property string $recipe_class_name
 * @property int $amount
 * @property string $components
 * @property string $returned_item_class
 * @property Carbon $time
 * @property Account $account
 * @property Clan|null $clan
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|CraftingLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CraftingLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CraftingLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|CraftingLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CraftingLog whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CraftingLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CraftingLog whereComponents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CraftingLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CraftingLog wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CraftingLog whereRecipeClassName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CraftingLog whereReturnedItemClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CraftingLog whereTime($value)
 * @mixin \Eloquent
 */
class CraftingLog extends Model
{
	protected $connection = 'portal';
	protected $table = 'crafting_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'amount' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'account_uid',
		'clan_id',
		'player_pos',
		'recipe_class_name',
		'amount',
		'components',
		'returned_item_class',
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
}
