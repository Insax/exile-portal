<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingBreaching
 *
 * @property int $id
 * @property string $player_id
 * @property string|null $clan_id
 * @property string $action
 * @property string $construction_id
 * @property string $territory_id
 * @property string $position
 * @property string $charge_class
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingBreaching newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingBreaching newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingBreaching query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingBreaching whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingBreaching whereChargeClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingBreaching whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingBreaching whereConstructionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingBreaching whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingBreaching wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingBreaching wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingBreaching whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingBreaching whereTime($value)
 * @mixin \Eloquent
 */
class GameServerLoggingBreaching extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_breaching';
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
