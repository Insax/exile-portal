<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Marxet
 *
 * @property string $listingID
 * @property bool $itemAvailable
 * @property string $itemArray
 * @property float $price
 * @property string $sellerUID
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property Account $account
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet whereItemArray($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet whereItemAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet whereListingID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet whereSellerUID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marxet whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Marxet extends Model
{
	protected $connection = 'portal';
	protected $table = 'marxets';
	protected $primaryKey = 'listingID';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'itemAvailable' => 'bool',
		'price' => 'float'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'sellerUID');
	}
}
