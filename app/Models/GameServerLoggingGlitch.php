<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingGlitch
 *
 * @property int $id
 * @property string $player_id
 * @property string $action
 * @property string $object_id
 * @property string $pos
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGlitch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGlitch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGlitch query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGlitch whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGlitch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGlitch whereObjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGlitch wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGlitch wherePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingGlitch whereTime($value)
 * @mixin \Eloquent
 */
class GameServerLoggingGlitch extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_glitch';
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
		'player_id',
		'action',
		'object_id',
		'pos',
		'time'
	];
}
