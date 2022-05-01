<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
 * @package App\Models\Gameserver
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayerStat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayerStat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayerStat query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayerStat whereBambikill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayerStat whereDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayerStat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayerStat whereKiller($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayerStat whereKillerPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayerStat whereRaidkill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayerStat whereTerritorykill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayerStat whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayerStat whereVictim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayerStat whereVictimPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerPlayerStat whereWeaponused($value)
 * @mixin \Eloquent
 */
class GameServerPlayerStat extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'player_stats';
	public $incrementing = false;
	public $timestamps = false;

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

	protected $fillable = [
		'id',
		'killer',
		'victim',
		'weaponused',
		'distance',
		'bambikill',
		'raidkill',
		'territorykill',
		'killer_position',
		'victim_position',
		'time'
	];
}
