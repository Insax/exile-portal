<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class GlitchLog
 *
 * @property int $id
 * @property string $account_uid
 * @property string $action
 * @property int $construction_id
 * @property string $pos
 * @property Carbon $time
 * @property Account $account
 * @property Construction $construction
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|GlitchLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GlitchLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GlitchLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|GlitchLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlitchLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlitchLog whereConstructionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlitchLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlitchLog wherePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlitchLog whereTime($value)
 * @mixin \Eloquent
 */
class GlitchLog extends Logging
{
	protected $connection = 'portal';
	protected $table = 'glitch_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'construction_id' => 'int'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_uid');
    }

	public function construction(): BelongsTo
	{
		return $this->belongsTo(Construction::class)->withTrashed();
	}

    function toString(): string
    {
        return view('logs.entries.glitch', ['log' => $this])->render();
    }
}
