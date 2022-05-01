<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingInmateMarket
 *
 * @property int $id
 * @property string $buyer_id
 * @property string $seller_id
 * @property string $item_class
 * @property string $price
 * @property Carbon $time
 *
 * @package App\Models
 */
class GameServerLoggingInmateMarket extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_inmate_market';
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
		'buyer_id',
		'seller_id',
		'item_class',
		'price',
		'time'
	];
}
