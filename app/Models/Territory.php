<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Territory
 *
 * @property int $id
 * @property string|null $esm_custom_id
 * @property string $owner_uid
 * @property string $name
 * @property float $position_x
 * @property float $position_y
 * @property float $position_z
 * @property float $radius
 * @property int $level
 * @property string $flag_texture
 * @property bool $flag_stolen
 * @property string|null $flag_stolen_by_uid
 * @property Carbon|null $flag_stolen_at
 * @property Carbon $last_paid_at
 * @property bool $xm8_protectionmoney_notified
 * @property int $esm_payment_counter
 * @property string|null $deleted_at
 * @property string $territory_permissions
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $trashed_at
 *
 * @property Account $account
 * @property TerritoryBuilder $territoryBuilder
 * @property Collection|TerritoryConstructionCountTime[] $territoryConstructionCountTimes
 * @property Collection|TerritoryContainerContent[] $territoryContainerContents
 * @property Collection|TerritoryContainerCountTime[] $territoryContainerCountTimes
 * @property Collection|TerritoryItemCountTime[] $territoryItemCountTimes
 * @property TerritoryMember $territoryMember
 * @property TerritoryModerator $territoryModerator
 * @property Collection|TerritoryMoney[] $territoryMoneys
 * @property Collection|TerritoryOnlineTime[] $territoryOnlineTimes
 * @property Collection|TerritoryRaidTime[] $territoryRaidTimes
 *
 * @package App\Models
 */
class Territory extends Model
{
	protected $connection = 'portal';
	protected $table = 'territories';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'position_x' => 'float',
		'position_y' => 'float',
		'position_z' => 'float',
		'radius' => 'float',
		'level' => 'int',
		'flag_stolen' => 'bool',
		'xm8_protectionmoney_notified' => 'bool',
		'esm_payment_counter' => 'int'
	];

	protected $dates = [
		'flag_stolen_at',
		'last_paid_at',
		'trashed_at'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'owner_uid');
	}

    public function containers(): HasMany
    {
        return $this->hasMany(Container::class);
    }

	public function territoryBuilder(): HasOne
	{
		return $this->hasOne(TerritoryBuilder::class);
	}

	public function territoryConstructionCountTimes(): HasMany
	{
		return $this->hasMany(TerritoryConstructionCountTime::class);
	}

	public function territoryContainerContents(): HasMany
	{
		return $this->hasMany(TerritoryContainerContent::class);
	}

	public function territoryContainerCountTimes(): HasMany
	{
		return $this->hasMany(TerritoryContainerCountTime::class);
	}

	public function territoryItemCountTimes(): HasMany
	{
		return $this->hasMany(TerritoryItemCountTime::class);
	}

	public function territoryMember(): HasMany
	{
		return $this->hasMany(TerritoryMember::class);
	}

    public function territoryMembers(): BelongsToMany
    {
        return $this->belongsToMany(Account::class, 'territory_members', 'territory_id', 'account_uid');
    }

	public function territoryModerator(): HasOne
	{
		return $this->hasOne(TerritoryModerator::class);
	}

	public function territoryMoneys(): HasMany
	{
		return $this->hasMany(TerritoryMoney::class);
	}

	public function territoryOnlineTimes(): HasMany
	{
		return $this->hasMany(TerritoryOnlineTime::class);
	}

	public function territoryRaidTimes(): HasMany
	{
		return $this->hasMany(TerritoryRaidTime::class);
	}
}
