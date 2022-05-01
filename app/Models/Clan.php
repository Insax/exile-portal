<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Clan
 *
 * @property int $id
 * @property string $name
 * @property string $leader_uid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Account $account
 * @property ClanModerator $clanModerator
 * @property Collection|ClanMoney[] $clanMoneys
 * @property Collection|GroupOnlineTime[] $groupOnlineTimes
 *
 * @package App\Models
 */
class Clan extends Model
{
	protected $connection = 'portal';
	protected $table = 'clans';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'leader_uid');
	}

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }

	public function clanModerator(): HasOne
	{
		return $this->hasOne(ClanModerator::class);
	}

	public function clanMoneys(): HasMany
	{
		return $this->hasMany(ClanMoney::class);
	}

	public function groupOnlineTimes(): HasMany
	{
		return $this->hasMany(GroupOnlineTime::class);
	}
}
