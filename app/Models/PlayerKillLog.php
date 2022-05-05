<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class PlayerKillLog
 *
 * @property int $id
 * @property string $killer_account_uid
 * @property int|null $killer_clan_id
 * @property string $killer_pos
 * @property string $victim_account_uid
 * @property int|null $victim_clan_id
 * @property string $victim_pos
 * @property Carbon $time
 * @property Account $account
 * @property Clan|null $clan
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerKillLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerKillLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerKillLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerKillLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerKillLog whereKillerAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerKillLog whereKillerClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerKillLog whereKillerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerKillLog whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerKillLog whereVictimAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerKillLog whereVictimClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerKillLog whereVictimPos($value)
 * @mixin \Eloquent
 */
class PlayerKillLog extends Logging
{
	protected $connection = 'portal';
	protected $table = 'player_kill_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'killer_clan_id' => 'int',
		'victim_clan_id' => 'int'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'victim_account_uid');
	}

	public function clan(): BelongsTo
	{
		return $this->belongsTo(Clan::class, 'victim_clan_id');
	}

    function toString(): string
    {
        return '';
    }
}
