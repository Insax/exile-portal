<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
 * @property GameServerAccount $account
 * @package App\Models\Gameserver
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereAlcohol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereAssignedItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereBackpack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereBackpackItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereBackpackMagazines($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereBackpackWeapons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereBinocular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereBleedingRemaining($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereCurrentWeapon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereDamage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereDirection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereGoggles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereHandgunItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereHandgunWeapon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereHeadgear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereHitpoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereHunger($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereLastUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereLoadedMagazines($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereLoadout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereOxygenRemaining($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer wherePositionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer wherePositionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer wherePositionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer wherePrimaryWeapon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer wherePrimaryWeaponItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereSecondaryWeapon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereSecondaryWeaponItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereSpawnedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereTemperature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereThirst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereUniform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereUniformItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereUniformMagazines($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereUniformWeapons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereVest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereVestItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereVestMagazines($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereVestWeapons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayer whereWetness($value)
 * @mixin \Eloquent
 */
class GameServerPlayer extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'player';
	public $timestamps = false;

	protected $casts = [
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

	protected $fillable = [
		'name',
		'money',
		'damage',
		'hunger',
		'thirst',
		'alcohol',
		'temperature',
		'wetness',
		'oxygen_remaining',
		'bleeding_remaining',
		'hitpoints',
		'direction',
		'position_x',
		'position_y',
		'position_z',
		'spawned_at',
		'assigned_items',
		'backpack',
		'backpack_items',
		'backpack_magazines',
		'backpack_weapons',
		'current_weapon',
		'goggles',
		'handgun_items',
		'handgun_weapon',
		'headgear',
		'binocular',
		'loaded_magazines',
		'primary_weapon',
		'primary_weapon_items',
		'secondary_weapon',
		'secondary_weapon_items',
		'uniform',
		'uniform_items',
		'uniform_magazines',
		'uniform_weapons',
		'vest',
		'vest_items',
		'vest_magazines',
		'vest_weapons',
		'last_updated_at',
		'loadout'
	];

	public function account()
	{
		return $this->belongsTo(GameServerAccount::class, 'account_uid');
	}
}
