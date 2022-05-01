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
 * 
 * @property Account $account
 *
 * @package App\Models
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

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'owner_uid');
	}
}
