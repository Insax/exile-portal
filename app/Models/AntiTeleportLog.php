<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class AntiTeleportLog
 *
 * @property int $id
 * @property string $account_uid
 * @property string|null $vehicle_class
 * @property int $distance
 * @property string $old_pos
 * @property string $new_pos
 * @property int $tp_count
 * @property Carbon $time
 * @property Account $account
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|AntiTeleportLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AntiTeleportLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AntiTeleportLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|AntiTeleportLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AntiTeleportLog whereDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AntiTeleportLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AntiTeleportLog whereNewPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AntiTeleportLog whereOldPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AntiTeleportLog whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AntiTeleportLog whereTpCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AntiTeleportLog whereVehicleClass($value)
 * @mixin \Eloquent
 */
class AntiTeleportLog extends Logging
{
	protected $connection = 'portal';
	protected $table = 'anti_teleport_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'distance' => 'int',
		'tp_count' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'account_uid',
		'vehicle_class',
		'distance',
		'old_pos',
		'new_pos',
		'tp_count',
		'time'
	];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}

    function toString(): string
    {
        return view('logs.entries.anti-tp', ['log', $this])->render();
    }
}
