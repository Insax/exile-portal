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
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ServerMoney newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServerMoney newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServerMoney query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServerMoney whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServerMoney whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServerMoney whereTime($value)
 * @mixin \Eloquent
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
