<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
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
 * @property-read Account $account
 * @method static Builder|ParsedDailyRewardLog newModelQuery()
 * @method static Builder|ParsedDailyRewardLog newQuery()
 * @method static Builder|ParsedDailyRewardLog query()
 * @method static Builder|ParsedDailyRewardLog whereAccountUid($value)
 * @method static Builder|ParsedDailyRewardLog whereId($value)
 * @method static Builder|ParsedDailyRewardLog wherePortalInstanceId($value)
 * @method static Builder|ParsedDailyRewardLog whereReward($value)
 * @method static Builder|ParsedDailyRewardLog whereTime($value)
 * @mixin Eloquent
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
