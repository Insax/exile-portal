<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZLoggingFamily
 *
 * @property int $id
 * @property string $action
 * @property string|null $clan_id
 * @property string $source_account_id
 * @property string|null $target_account_id
 * @property Carbon $time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingFamily newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingFamily newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingFamily query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingFamily whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingFamily whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingFamily whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingFamily whereSourceAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingFamily whereTargetAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameServerLoggingFamily whereTime($value)
 * @mixin \Eloquent
 */
class GameServerLoggingFamily extends Model
{
	protected $connection = 'gameserver';
	protected $table = 'z_logging_family';
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
