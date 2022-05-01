<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InfistarLog
 *
 * @property int $id
 * @property string|null $servername
 * @property string|null $logname
 * @property string|null $logentry
 * @property Carbon $time
 * @package App\Models\Gameserver
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerInfistarLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerInfistarLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerInfistarLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerInfistarLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerInfistarLog whereLogentry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerInfistarLog whereLogname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerInfistarLog whereServername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerInfistarLog whereTime($value)
 * @mixin \Eloquent
 */
class GameServerInfistarLog extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'infistar_logs';
	public $timestamps = false;

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'servername',
		'logname',
		'logentry',
		'time'
	];
}
