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
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Container
 *
 * @property int $id
 * @property string $class
 * @property Carbon $spawned_at
 * @property string|null $account_uid
 * @property bool $is_locked
 * @property float $position_x
 * @property float $position_y
 * @property float $position_z
 * @property float $direction_x
 * @property float $direction_y
 * @property float $direction_z
 * @property float $up_x
 * @property float $up_y
 * @property float $up_z
 * @property string $cargo_items
 * @property string $cargo_magazines
 * @property string $cargo_weapons
 * @property string $cargo_container
 * @property Carbon $last_updated_at
 * @property string $pin_code
 * @property int|null $territory_id
 * @property string|null $deleted_at
 * @property int $money
 * @property Carbon|null $abandoned
 * @property string $inventory
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $trashed_at
 * @property Account|null $account
 * @property Collection|ContainerPackLog[] $containerPackLogs
 * @property Collection|SafeHackingLog[] $safeHackingLogs
 * @package App\Models
 * @property-read int|null $container_pack_logs_count
 * @property-read int|null $safe_hacking_logs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Container newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Container newQuery()
 * @method static \Illuminate\Database\Query\Builder|Container onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Container query()
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereAbandoned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereCargoContainer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereCargoItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereCargoMagazines($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereCargoWeapons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereDirectionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereDirectionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereDirectionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereIsLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereLastUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container wherePinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container wherePositionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container wherePositionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container wherePositionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereSpawnedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereTrashedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereUpX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereUpY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereUpZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Container withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Container withoutTrashed()
 * @mixin \Eloquent
 */
class Container extends Model
{
    use SoftDeletes;

	protected $connection = 'portal';
	protected $table = 'containers';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

    const DELETED_AT = 'trashed_at';

	protected $casts = [
		'id' => 'int',
		'is_locked' => 'bool',
		'position_x' => 'float',
		'position_y' => 'float',
		'position_z' => 'float',
		'direction_x' => 'float',
		'direction_y' => 'float',
		'direction_z' => 'float',
		'up_x' => 'float',
		'up_y' => 'float',
		'up_z' => 'float',
		'territory_id' => 'int',
		'money' => 'int'
	];

	protected $dates = [
		'spawned_at',
		'last_updated_at',
		'abandoned',
		'trashed_at'
	];

    protected $guarded = [];

    public static function findOrCreateDummy(?int $containerId)
    {
        if($containerId == null || self::whereId($containerId)->exists())
            return;

        $dummyConstruction = self::create([
            'id' => $containerId,
            'class' => 'Dummy',
            'spawned_at' => Carbon::now(),
            'account_uid' => null,
            'is_locked' => 0,
            'position_x' => '0',
            'position_y' => '0',
            'position_z' => '0',
            'direction_x' => '0',
            'direction_y' => '0',
            'direction_z' => '0',
            'up_x' => '0',
            'up_y' => '0',
            'up_z' => '0',
            'cargo_items' => '[[],[]]',
            'cargo_magazines' => '[]',
            'cargo_weapons' => '[]',
            'cargo_container' => '[]',
            'last_updated_at' => Carbon::now(),
            'pin_code' => '0000',
            'territory_id' => null,
            'deleted_at' => Carbon::now(),
            'money' => 0,
            'abandoned' => null,
            'inventory' => '[[],[[],[]],[[],[]],[[],[]],[]]',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $dummyConstruction->delete();
    }

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}

	public function containerPackLogs(): HasMany
	{
		return $this->hasMany(ContainerPackLog::class);
	}

	public function safeHackingLogs(): HasMany
	{
		return $this->hasMany(SafeHackingLog::class);
	}
}
