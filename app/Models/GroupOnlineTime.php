<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class GroupOnlineTime
 *
 * @property int $id
 * @property int $clan_id
 * @property int $online_count
 * @property Carbon $time
 * @property Clan $clan
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GroupOnlineTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupOnlineTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupOnlineTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupOnlineTime whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupOnlineTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupOnlineTime whereOnlineCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupOnlineTime whereTime($value)
 * @mixin \Eloquent
 */
class GroupOnlineTime extends Model
{
	protected $connection = 'portal';
	protected $table = 'group_online_times';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'clan_id' => 'int',
		'online_count' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'clan_id',
		'online_count',
		'time'
	];

	public function clan(): BelongsTo
	{
		return $this->belongsTo(Clan::class);
	}
}
