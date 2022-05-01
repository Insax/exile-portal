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
 *
 * @property Account $account
 *
 * @package App\Models
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
