<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ReadableLogging
 *
 * @property int $id
 * @property string $type
 * @property string $account_uid
 * @property int|null $clan_id
 * @property int|null $territory_id
 * @property string $loggable_type
 * @property int $loggable_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Account $account
 * @property Clan|null $clan
 * @property Territory|null $territory
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ReadableLogging newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReadableLogging newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReadableLogging query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReadableLogging whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReadableLogging whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReadableLogging whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReadableLogging whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReadableLogging whereLoggableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReadableLogging whereLoggableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReadableLogging whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReadableLogging whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReadableLogging whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ReadableLogging extends Model
{
	protected $connection = 'portal';
	protected $table = 'readable_loggings';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'clan_id' => 'int',
		'territory_id' => 'int',
		'loggable_id' => 'int'
	];

	protected $fillable = [
		'type',
		'account_uid',
		'clan_id',
		'territory_id',
		'loggable_type',
		'loggable_id'
	];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}

	public function clan(): BelongsTo
	{
		return $this->belongsTo(Clan::class);
	}

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class);
	}
}
