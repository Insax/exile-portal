<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class PlayerStat
 *
 * @property int $id
 * @property string|null $killer
 * @property string|null $victim
 * @property string|null $weaponused
 * @property int|null $distance
 * @property int|null $bambikill
 * @property int|null $raidkill
 * @property int|null $territorykill
 * @property string $killer_position
 * @property string $victim_position
 * @property Carbon|null $time
 *
 * @property Account|null $account
 *
 * @package App\Models
 */
class PlayerStat extends Model
{
	protected $connection = 'portal';
	protected $table = 'player_stats';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'distance' => 'int',
		'bambikill' => 'int',
		'raidkill' => 'int',
		'territorykill' => 'int'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'victim');
	}
}
