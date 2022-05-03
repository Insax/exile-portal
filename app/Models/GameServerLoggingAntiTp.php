<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingAntiTp
 *
 * @property int $id
 * @property string $player_id
 * @property string|null $class
 * @property string $distance
 * @property string $old_pos
 * @property string $new_pos
 * @property string $tp_count
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingAntiTp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingAntiTp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingAntiTp query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingAntiTp whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingAntiTp whereDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingAntiTp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingAntiTp whereNewPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingAntiTp whereOldPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingAntiTp wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingAntiTp whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingAntiTp whereTpCount($value)
 * @mixin \Eloquent
 */
class GameServerLoggingAntiTp extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_anti_tp';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];
}
