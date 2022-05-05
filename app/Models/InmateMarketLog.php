<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class InmateMarketLog
 *
 * @property int $id
 * @property string $buyer_account_uid
 * @property string $seller_account_uid
 * @property string $item_class
 * @property int $price
 * @property Carbon $time
 * @property Account $account
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|InmateMarketLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InmateMarketLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InmateMarketLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|InmateMarketLog whereBuyerAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InmateMarketLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InmateMarketLog whereItemClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InmateMarketLog wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InmateMarketLog whereSellerAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InmateMarketLog whereTime($value)
 * @mixin \Eloquent
 */
class InmateMarketLog extends Logging
{
	protected $connection = 'portal';
	protected $table = 'inmate_market_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'price' => 'int'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'seller_account_uid');
	}

    function toString(): string
    {
        return '';
    }
}
