<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Marxet
 *
 * @property string $listingID
 * @property bool $itemAvailable
 * @property string $itemArray
 * @property float $price
 * @property string $sellerUID
 * @property Carbon $created_at
 * @package App\Models\Gameserver
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerMarxet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerMarxet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerMarxet query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerMarxet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerMarxet whereItemArray($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerMarxet whereItemAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerMarxet whereListingID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerMarxet wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerMarxet whereSellerUID($value)
 * @mixin \Eloquent
 */
class GameServerMarxet extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'marxet';
	protected $primaryKey = 'listingID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'itemAvailable' => 'bool',
		'price' => 'float'
	];

	protected $fillable = [
		'itemAvailable',
		'itemArray',
		'price',
		'sellerUID'
	];
}
