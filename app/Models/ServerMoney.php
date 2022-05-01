<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ServerMoney
 * 
 * @property int $id
 * @property int $money
 * @property Carbon $time
 *
 * @package App\Models
 */
class ServerMoney extends Model
{
	protected $connection = 'portal';
	protected $table = 'server_money';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'money' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'money',
		'time'
	];
}
