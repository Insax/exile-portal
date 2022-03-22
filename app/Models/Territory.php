<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Territory
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
 * @property \Illuminate\Support\Carbon|null $flag_stolen_at
 * @property string $created_at
 * @property \Illuminate\Support\Carbon|null $last_paid_at
 * @property bool $xm8_protectionmoney_notified
 * @property string $build_rights
 * @property string $moderators
 * @property int $esm_payment_counter
 * @property string|null $deleted_at
 * @property string $territory_permissions
 * @property-read Collection|\App\Models\TerritoryContainerContent[] $containerContent
 * @property-read int|null $container_content_count
 * @property-read Collection|\App\Models\Container[] $containers
 * @property-read int|null $containers_count
 * @property-read Collection|\App\Models\Account[] $members
 * @property-read int|null $members_count
 * @property-read \App\Models\Account $ownerAccount
 * @property-read \App\Models\Account|null $territoryFlagStealer
 * @method static Builder|Territory newModelQuery()
 * @method static Builder|Territory newQuery()
 * @method static Builder|Territory query()
 * @method static Builder|Territory whereBuildRights($value)
 * @method static Builder|Territory whereCreatedAt($value)
 * @method static Builder|Territory whereDeletedAt($value)
 * @method static Builder|Territory whereEsmCustomId($value)
 * @method static Builder|Territory whereEsmPaymentCounter($value)
 * @method static Builder|Territory whereFlagStolen($value)
 * @method static Builder|Territory whereFlagStolenAt($value)
 * @method static Builder|Territory whereFlagStolenByUid($value)
 * @method static Builder|Territory whereFlagTexture($value)
 * @method static Builder|Territory whereId($value)
 * @method static Builder|Territory whereLastPaidAt($value)
 * @method static Builder|Territory whereLevel($value)
 * @method static Builder|Territory whereModerators($value)
 * @method static Builder|Territory whereName($value)
 * @method static Builder|Territory whereOwnerUid($value)
 * @method static Builder|Territory wherePositionX($value)
 * @method static Builder|Territory wherePositionY($value)
 * @method static Builder|Territory wherePositionZ($value)
 * @method static Builder|Territory whereRadius($value)
 * @method static Builder|Territory whereTerritoryPermissions($value)
 * @method static Builder|Territory whereXm8ProtectionmoneyNotified($value)
 * @mixin Eloquent
 */
class Territory extends Model
{
    public $timestamps = false;

    protected $connection = 'gameserver';
    protected $table = 'territory';
    protected $casts = [
        'position_x' => 'float',
        'position_y' => 'float',
        'position_z' => 'float',
        'radius' => 'float',
        'level' => 'int',
        'flag_stolen' => 'bool',
        'xm8_protectionmoney_notified' => 'bool',
        'esm_payment_counter' => 'int'
    ];

    /** @var string[]  */
    protected $dates = [
        'flag_stolen_at',
        'last_paid_at'
    ];

    protected $fillable = [
        'esm_custom_id',
        'owner_uid',
        'name',
        'position_x',
        'position_y',
        'position_z',
        'radius',
        'level',
        'flag_texture',
        'flag_stolen',
        'flag_stolen_by_uid',
        'flag_stolen_at',
        'last_paid_at',
        'xm8_protectionmoney_notified',
        'build_rights',
        'moderators',
        'esm_payment_counter',
        'territory_permissions'
    ];

    /**
     * @return BelongsTo
     */
    public function ownerAccount(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'owner_uid');
    }

    /**
     * @return BelongsToMany
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Account::class, 'territory_members', 'territory_id', 'account_uid');
    }

    /**
     * @return HasOne
     */
    public function territoryFlagStealer(): HasOne
    {
        return $this->hasOne(Account::class, 'uid', 'flag_stolen_by_uid');
    }

    public function containers(): HasMany
    {
        return $this->hasMany(Container::class, 'territory_id', 'id');
    }

    public function containerContent(): HasMany
    {
        return $this->hasMany(TerritoryContainerContent::class, 'territory_id', 'id');
    }
}
