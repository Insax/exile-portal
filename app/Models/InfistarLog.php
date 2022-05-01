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
 *
 * @package App\Models
 */
class InfistarLog extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'infistar_logs';
	public $timestamps = false;
	public static $snakeAttributes = false;

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
