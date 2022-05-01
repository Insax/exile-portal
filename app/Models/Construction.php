<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Construction
 *
 * @property int $id
 * @property string $class
 * @property string $account_uid
 * @property Carbon $spawned_at
 * @property float $position_x
 * @property float $position_y
 * @property float $position_z
 * @property float $direction_x
 * @property float $direction_y
 * @property float $direction_z
 * @property float $up_x
 * @property float $up_y
 * @property float $up_z
 * @property bool $is_locked
 * @property string $pin_code
 * @property int $damage
 * @property int|null $territory_id
 * @property Carbon $last_updated_at
 * @property string|null $deleted_at
 * @property string|null $construction_texture
 * @property string $construction_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $trashed_at
 *
 * @property Account $account
 *
 * @package App\Models
 */
class Construction extends Model
{
	protected $connection = 'portal';
	protected $table = 'constructions';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'position_x' => 'float',
		'position_y' => 'float',
		'position_z' => 'float',
		'direction_x' => 'float',
		'direction_y' => 'float',
		'direction_z' => 'float',
		'up_x' => 'float',
		'up_y' => 'float',
		'up_z' => 'float',
		'is_locked' => 'bool',
		'damage' => 'int',
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
