<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ClanModerator
 *
 * @property int $clan_id
 * @property string $account_uid
 * @property Account $account
 * @property Clan $clan
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ClanModerator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClanModerator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClanModerator query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClanModerator whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClanModerator whereClanId($value)
 * @mixin \Eloquent
 */
class ClanModerator extends Model
{
	protected $connection = 'portal';
	protected $table = 'clan_moderators';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'clan_id' => 'int'
	];

	protected $fillable = [
		'clan_id',
		'account_uid'
	];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}

	public function clan(): BelongsTo
	{
		return $this->belongsTo(Clan::class);
	}
}
