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
 *
 * @package App\Models
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

	protected $fillable = [
		'id',
		'action',
		'clan_id',
		'source_account_id',
		'target_account_id',
		'time'
	];
}
