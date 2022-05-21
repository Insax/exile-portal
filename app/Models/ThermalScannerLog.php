<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class ThermalScannerLog
 *
 * @property int $id
 * @property string $account_uid
 * @property int|null $clan_id
 * @property string $scanable_type
 * @property int $scanable_id
 * @property string $pin_code
 * @property string $player_pos
 * @property int|null $territory_id
 * @property bool|null $has_rights
 * @property Carbon $time
 * @property Account $account
 * @property Territory|null $territory
 * @property  Vehicle|Construction|Container $scanable
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ThermalScannerLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ThermalScannerLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ThermalScannerLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|ThermalScannerLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThermalScannerLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThermalScannerLog whereHasRights($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThermalScannerLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThermalScannerLog wherePinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThermalScannerLog wherePlayerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThermalScannerLog whereScanableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThermalScannerLog whereScanableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThermalScannerLog whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThermalScannerLog whereTime($value)
 * @mixin \Eloquent
 */
class ThermalScannerLog extends Logging
{
	protected $connection = 'portal';
	protected $table = 'thermal_scanner_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'scanable_id' => 'int',
		'territory_id' => 'int',
		'has_rights' => 'bool'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class)->withTrashed();
	}

    public function clan(): BelongsTo
    {
        return $this->belongsTo(Clan::class)->withTrashed();
    }

    public function scanable(): MorphTo
    {
        return $this->morphTo()->withTrashed();
    }

    function toString(): string
    {
        return view('logs.entries.thermalscan', ['log' => $this])->render();
    }
}
