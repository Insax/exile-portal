<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ClanMoney
 * 
 * @property int $id
 * @property int $clan_id
 * @property int $money
 * @property Carbon $time
 * 
 * @property Clan $clan
 *
 * @package App\Models
 */
class ClanMoney extends Model
{
	protected $connection = 'portal';
	protected $table = 'clan_money';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'clan_id' => 'int',
		'money' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'clan_id',
		'money',
		'time'
	];

	public function clan(): BelongsTo
	{
		return $this->belongsTo(Clan::class);
	}
}
