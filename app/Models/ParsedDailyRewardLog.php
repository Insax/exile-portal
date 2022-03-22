<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ParsedDailyRewardLog
 *
 * @property int $id
 * @property int $portal_instance_id
 * @property string $account_uid
 * @property string $reward
 * @property string $time
 * @property-read \App\Models\Account $account
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedDailyRewardLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedDailyRewardLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedDailyRewardLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedDailyRewardLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedDailyRewardLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedDailyRewardLog wherePortalInstanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedDailyRewardLog whereReward($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedDailyRewardLog whereTime($value)
 * @mixin \Eloquent
 */
class ParsedDailyRewardLog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'portal_instance_id',
        'account_uid',
        'reward',
        'time'
    ];

    /**
     * @return BelongsTo
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_uid', 'uid');
    }
}
