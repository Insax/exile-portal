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

/**
 * Class Clan
 *
 * @property int $id
 * @property string $name
 * @property string $leader_uid
 * @property Carbon $created_at
 * @property string $moderators
 * @property GameServerAccount $account
 * @property Collection|GameServerAccount[] $accounts
 * @package App\Models\Gameserver
 * @property-read int|null $accounts_count
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerClan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerClan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerClan query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerClan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerClan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerClan whereLeaderUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerClan whereModerators($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerClan whereName($value)
 * @mixin \Eloquent
 */
class GameServerClan extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'clan';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'leader_uid'
	];

    protected $casts = [
        'moderators' => 'array'
    ];

	public function account(): BelongsTo
    {
		return $this->belongsTo(GameServerAccount::class, 'leader_uid');
	}

	public function accounts(): HasMany
    {
		return $this->hasMany(GameServerAccount::class);
	}
}
