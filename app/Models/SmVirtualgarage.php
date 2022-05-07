<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property Account $account
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage query()
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereCargo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereDamage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereDeletedAt($value)
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
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmVirtualgarage whereWeapons($value)
 * @mixin \Eloquent
 */
class SmVirtualgarage extends Model
{
	protected $connection = 'portal';
	protected $table = 'sm_virtualgarages';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'fuel' => 'float'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'owner_uid');
	}
}
