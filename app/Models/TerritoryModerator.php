<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TerritoryModerator
 * 
 * @property int $territory_id
 * @property string $account_uid
 * 
 * @property Account $account
 * @property Territory $territory
 *
 * @package App\Models
 */
class TerritoryModerator extends Model
{
	protected $connection = 'portal';
	protected $table = 'territory_moderators';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'territory_id' => 'int'
	];

	protected $fillable = [
		'territory_id',
		'account_uid'
	];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class);
	}
}
