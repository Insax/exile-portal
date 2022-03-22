<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SmVirtualgarage
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
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage query()
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereCargo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereDamage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereFuel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereHitpoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereMagazines($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereOwnerUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage wherePincode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage wherePoptabs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage wherePuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereTextures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereWeapons($value)
 * @mixin \Eloquent
 */
class SmVirtualgarage extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $connection = 'gameserver';
    protected $table = 'sm_virtualgarage';
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
