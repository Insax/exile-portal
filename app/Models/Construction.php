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
 * Class Construction
 *
 * @property int $id
 * @property string $class
 * @property string $account_uid
 * @property Carbon $spawned_at
 * @property float $position_x
 * @property float $position_y
 * @property float $position_z
 * @property float $direction_x
 * @property float $direction_y
 * @property float $direction_z
 * @property float $up_x
 * @property float $up_y
 * @property float $up_z
 * @property bool $is_locked
 * @property string $pin_code
 * @property int $damage
 * @property int|null $territory_id
 * @property Carbon $last_updated_at
 * @property string|null $deleted_at
 * @property string|null $construction_texture
 * @property string $construction_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $trashed_at
 * @property Account $account
 * @property Collection|BreachingLog[] $breachingLogs
 * @property Collection|GlitchLog[] $glitchLogs
 * @property Collection|GrindingLog[] $grindingLogs
 * @package App\Models
 * @property-read int|null $breaching_logs_count
 * @property-read int|null $glitch_logs_count
 * @property-read int|null $grinding_logs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Construction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Construction newQuery()
 * @method static \Illuminate\Database\Query\Builder|Construction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Construction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereConstructionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereConstructionTexture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereDamage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereDirectionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereDirectionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereDirectionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereIsLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereLastUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction wherePinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction wherePositionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction wherePositionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction wherePositionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereSpawnedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereTrashedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereUpX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereUpY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereUpZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Construction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Construction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Construction withoutTrashed()
 * @mixin \Eloquent
 */
class Construction extends Model
{
    use SoftDeletes;

	protected $connection = 'portal';
	protected $table = 'constructions';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

    const DELETED_AT = 'trashed_at';

	protected $casts = [
		'id' => 'int',
		'position_x' => 'float',
		'position_y' => 'float',
		'position_z' => 'float',
		'direction_x' => 'float',
		'direction_y' => 'float',
		'direction_z' => 'float',
		'up_x' => 'float',
		'up_y' => 'float',
		'up_z' => 'float',
		'is_locked' => 'bool',
		'damage' => 'int',
		'territory_id' => 'int'
	];

	protected $dates = [
		'spawned_at',
		'last_updated_at',
		'trashed_at'
	];

    protected $guarded = [];

    public static function findOrCreateDummy(int $constructionId)
    {
        if($constructionId == null || self::whereId($constructionId)->exists())
            return;

        $dummyConstruction = self::create([
            'id' => $constructionId,
            'class' => 'Dummy',
            'account_uid' => null,
            'spawned_at' => Carbon::now(),
            'position_x' => '0',
            'position_y' => '0',
            'position_z' => '0',
            'direction_x' => '0',
            'direction_y' => '0',
            'direction_z' => '0',
            'up_x' => '0',
            'up_y' => '0',
            'up_z' => '0',
            'is_locked' => 0,
            'pin_code' => '000000',
            'damage' => '0',
            'territory_id' => null,
            'last_updated_at' => Carbon::now(),
            'deleted_at' => Carbon::now(),
            'construction_texture' => null,
            'construction_name' => 'Dummy',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $dummyConstruction->delete();
    }

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}

	public function breachingLogs(): HasMany
	{
		return $this->hasMany(BreachingLog::class);
	}

	public function glitchLogs(): HasMany
	{
		return $this->hasMany(GlitchLog::class);
	}

	public function grindingLogs(): HasMany
	{
		return $this->hasMany(GrindingLog::class);
	}
}
