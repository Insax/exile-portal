<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Vehicle
 *
 * @property int $id
 * @property string $class
 * @property Carbon $spawned_at
 * @property string $account_uid
 * @property bool $is_locked
 * @property float $fuel
 * @property float $damage
 * @property string|null $hitpoints
 * @property float $position_x
 * @property float $position_y
 * @property float $position_z
 * @property float $direction_x
 * @property float $direction_y
 * @property float $direction_z
 * @property float $up_x
 * @property float $up_y
 * @property float $up_z
 * @property string|null $cargo_items
 * @property string|null $cargo_magazines
 * @property string|null $cargo_weapons
 * @property string|null $cargo_container
 * @property Carbon $last_updated_at
 * @property string $pin_code
 * @property string|null $deleted_at
 * @property int $money
 * @property string|null $vehicle_texture
 * @property int|null $territory_id
 * @property string $nickname
 * @property string $tuning_data
 * @property string $exile_loading
 * @property string $inventory
 * @property string|null $marxet_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $trashed_at
 *
 * @property Account $account
 *
 * @package App\Models
 */
class Vehicle extends Model
{
	protected $connection = 'portal';
	protected $table = 'vehicles';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'is_locked' => 'bool',
		'fuel' => 'float',
		'damage' => 'float',
		'position_x' => 'float',
		'position_y' => 'float',
		'position_z' => 'float',
		'direction_x' => 'float',
		'direction_y' => 'float',
		'direction_z' => 'float',
		'up_x' => 'float',
		'up_y' => 'float',
		'up_z' => 'float',
		'money' => 'int',
		'territory_id' => 'int'
	];

	protected $dates = [
		'spawned_at',
		'last_updated_at',
		'trashed_at'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}
}
