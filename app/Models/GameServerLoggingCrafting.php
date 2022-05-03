<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingCrafting
 *
 * @property int $id
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $player_pos
 * @property string $recipe_class_name
 * @property string $amount
 * @property string $components
 * @property string $returned_item_class
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingCrafting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingCrafting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingCrafting query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingCrafting whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingCrafting whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingCrafting whereComponents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingCrafting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingCrafting wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingCrafting wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingCrafting whereRecipeClassName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingCrafting whereReturnedItemClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingCrafting whereTime($value)
 * @mixin \Eloquent
 */
class GameServerLoggingCrafting extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_crafting';
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
}
