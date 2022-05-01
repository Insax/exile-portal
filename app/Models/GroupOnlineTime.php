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
 * 
 * @property Clan $clan
 *
 * @package App\Models
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
