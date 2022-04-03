<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
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
 * @method static Builder|SmVirtualgarage newModelQuery()
 * @method static Builder|SmVirtualgarage newQuery()
 * @method static Builder|SmVirtualgarage query()
 * @method static Builder|SmVirtualgarage whereCargo($value)
 * @method static Builder|SmVirtualgarage whereClass($value)
 * @method static Builder|SmVirtualgarage whereDamage($value)
 * @method static Builder|SmVirtualgarage whereFuel($value)
 * @method static Builder|SmVirtualgarage whereHitpoints($value)
 * @method static Builder|SmVirtualgarage whereId($value)
 * @method static Builder|SmVirtualgarage whereItems($value)
 * @method static Builder|SmVirtualgarage whereMagazines($value)
 * @method static Builder|SmVirtualgarage whereOwnerUid($value)
 * @method static Builder|SmVirtualgarage wherePincode($value)
 * @method static Builder|SmVirtualgarage wherePoptabs($value)
 * @method static Builder|SmVirtualgarage wherePuid($value)
 * @method static Builder|SmVirtualgarage whereTextures($value)
 * @method static Builder|SmVirtualgarage whereWeapons($value)
 * @mixin Eloquent
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
