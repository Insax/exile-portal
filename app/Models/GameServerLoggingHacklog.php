<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingHacklog
 *
 * @property int $id
 * @property string $action
 * @property string $new_id
 * @property string $old_id
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHacklog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHacklog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHacklog query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHacklog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHacklog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHacklog whereNewId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHacklog whereOldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingHacklog whereTime($value)
 * @mixin \Eloquent
 */
class GameServerLoggingHacklog extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_hacklog';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'id',
		'action',
		'new_id',
		'old_id',
		'time'
	];
}
