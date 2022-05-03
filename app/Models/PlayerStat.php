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
 * @property Account|null $account
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerStat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerStat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerStat query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerStat whereBambikill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerStat whereDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerStat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerStat whereKiller($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerStat whereKillerPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerStat whereRaidkill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerStat whereTerritorykill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerStat whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerStat whereVictim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerStat whereVictimPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerStat whereWeaponused($value)
 * @mixin \Eloquent
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
