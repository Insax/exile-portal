<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Player
 *
 * @property int $id
 * @property string $name
 * @property string $account_uid
 * @property int $money
 * @property float $damage
 * @property float $hunger
 * @property float $thirst
 * @property float $alcohol
 * @property float $temperature
 * @property float $wetness
 * @property float $oxygen_remaining
 * @property float $bleeding_remaining
 * @property string $hitpoints
 * @property float $direction
 * @property float $position_x
 * @property float $position_y
 * @property float $position_z
 * @property Carbon $spawned_at
 * @property string $assigned_items
 * @property string $backpack
 * @property string $backpack_items
 * @property string $backpack_magazines
 * @property string $backpack_weapons
 * @property string $current_weapon
 * @property string $goggles
 * @property string $handgun_items
 * @property string $handgun_weapon
 * @property string $headgear
 * @property string $binocular
 * @property string $loaded_magazines
 * @property string $primary_weapon
 * @property string $primary_weapon_items
 * @property string $secondary_weapon
 * @property string $secondary_weapon_items
 * @property string $uniform
 * @property string $uniform_items
 * @property string $uniform_magazines
 * @property string $uniform_weapons
 * @property string $vest
 * @property string $vest_items
 * @property string $vest_magazines
 * @property string $vest_weapons
 * @property Carbon $last_updated_at
 * @property string $loadout
 *
 * @property Account $account
 *
 * @package App\Models
 */
class Player extends Model
{
	protected $connection = 'portal';
	protected $table = 'players';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'money' => 'int',
		'damage' => 'float',
		'hunger' => 'float',
		'thirst' => 'float',
		'alcohol' => 'float',
		'temperature' => 'float',
		'wetness' => 'float',
		'oxygen_remaining' => 'float',
		'bleeding_remaining' => 'float',
		'direction' => 'float',
		'position_x' => 'float',
		'position_y' => 'float',
		'position_z' => 'float'
	];

	protected $dates = [
		'spawned_at',
		'last_updated_at'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}
}
