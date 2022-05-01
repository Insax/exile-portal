<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
 * @property Carbon $created_at
 * @property Carbon|null $last_paid_at
 * @property bool $xm8_protectionmoney_notified
 * @property string $build_rights
 * @property string $moderators
 * @property int $esm_payment_counter
 * @property string|null $deleted_at
 * @property string $territory_permissions
 * @property GameServerAccount $account
 * @package App\Models\Gameserver
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory newQuery()
 * @method static \Illuminate\Database\Query\Builder|GameServerTerritory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereBuildRights($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereEsmCustomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereEsmPaymentCounter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereFlagStolen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereFlagStolenAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereFlagStolenByUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereFlagTexture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereLastPaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereModerators($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereOwnerUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory wherePositionX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory wherePositionY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory wherePositionZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereRadius($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereTerritoryPermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerTerritory whereXm8ProtectionmoneyNotified($value)
 * @method static \Illuminate\Database\Query\Builder|GameServerTerritory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|GameServerTerritory withoutTrashed()
 * @mixin \Eloquent
 */
class GameServerTerritory extends Model
{
	use SoftDeletes;
	protected $connection = 'gameserver';
	protected $table = 'territory';
	public $timestamps = false;

	protected $casts = [
		'position_x' => 'float',
		'position_y' => 'float',
		'position_z' => 'float',
		'radius' => 'float',
		'level' => 'int',
		'flag_stolen' => 'bool',
		'xm8_protectionmoney_notified' => 'bool',
		'esm_payment_counter' => 'int',
        'build_rights' => 'array',
        'moderators' => 'array'
	];

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

	public function account()
	{
		return $this->belongsTo(GameServerAccount::class, 'owner_uid');
	}
}
