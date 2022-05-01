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
 *
 * @package App\Models
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

	protected $fillable = [
		'id',
		'player_id',
		'clan_id',
		'player_pos',
		'recipe_class_name',
		'amount',
		'components',
		'returned_item_class',
		'time'
	];
}
