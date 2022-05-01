<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SmVirtualgarage
 *
 * @property int $id
 * @property string $class
 * @property string $puid
 * @property string $owner_uid
 * @property string $textures
 * @property string $poptabs
 * @property string $pincode
 * @property string $damage
 * @property string $hitpoints
 * @property float $fuel
 * @property string $items
 * @property string $magazines
 * @property string $weapons
 * @property string $cargo
 *
 * @package App\Models\Gameserver
 */
class GameServerSmVirtualgarage extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'sm_virtualgarage';
	public $timestamps = false;

	protected $casts = [
		'fuel' => 'float'
	];

	protected $fillable = [
		'class',
		'puid',
		'owner_uid',
		'textures',
		'poptabs',
		'pincode',
		'damage',
		'hitpoints',
		'fuel',
		'items',
		'magazines',
		'weapons',
		'cargo'
	];
}
