<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingContainerPack
 *
 * @property int $id
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $container_id
 * @property string $container_pos
 * @property string $territory_id
 * @property string $build_rights
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingContainerPack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingContainerPack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingContainerPack query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingContainerPack whereBuildRights($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingContainerPack whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingContainerPack whereContainerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingContainerPack whereContainerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingContainerPack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingContainerPack wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingContainerPack whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingContainerPack whereTime($value)
 * @mixin \Eloquent
 */
class GameServerLoggingContainerPack extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_container_pack';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];
}
