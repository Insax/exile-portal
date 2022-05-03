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
 * @package App\Models\Gameserver
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerSmVirtualgarage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerSmVirtualgarage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerSmVirtualgarage query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerSmVirtualgarage whereCargo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerSmVirtualgarage whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerSmVirtualgarage whereDamage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerSmVirtualgarage whereFuel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerSmVirtualgarage whereHitpoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerSmVirtualgarage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerSmVirtualgarage whereItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerSmVirtualgarage whereMagazines($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerSmVirtualgarage whereOwnerUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerSmVirtualgarage wherePincode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerSmVirtualgarage wherePoptabs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerSmVirtualgarage wherePuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerSmVirtualgarage whereTextures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerSmVirtualgarage whereWeapons($value)
 * @mixin \Eloquent
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
