<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class PartyLog
 *
 * @property int $id
 * @property string $action
 * @property string $account_uid
 * @property int|null $clan_id
 * @property string $invited_account_uid
 * @property int|null $invited_player_clan_id
 * @property string $group_name
 * @property Carbon $time
 * @property Account $account
 * @property Clan|null $clan
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|PartyLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartyLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartyLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|PartyLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartyLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartyLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartyLog whereGroupName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartyLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartyLog whereInvitedAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartyLog whereInvitedPlayerClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartyLog whereTime($value)
 * @mixin \Eloquent
 */
class PartyLog extends Model
{
	protected $connection = 'portal';
	protected $table = 'party_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'invited_player_clan_id' => 'int'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'invited_account_uid');
	}

	public function clan(): BelongsTo
	{
		return $this->belongsTo(Clan::class, 'invited_player_clan_id');
	}
}
