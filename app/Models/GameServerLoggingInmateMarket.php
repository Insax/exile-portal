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
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingInmateMarket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingInmateMarket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingInmateMarket query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingInmateMarket whereBuyerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingInmateMarket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingInmateMarket whereItemClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingInmateMarket wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingInmateMarket whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingInmateMarket whereTime($value)
 * @mixin \Eloquent
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
