<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ParsedInmateMarketLog
 *
 * @property int $id
 * @property int $portal_instance_id
 * @property string $source_account_uid
 * @property string|null $receiver_account_uid
 * @property string $item
 * @property int $price
 * @property string $time
 * @method static Builder|ParsedInmateMarketLog newModelQuery()
 * @method static Builder|ParsedInmateMarketLog newQuery()
 * @method static Builder|ParsedInmateMarketLog query()
 * @method static Builder|ParsedInmateMarketLog whereId($value)
 * @method static Builder|ParsedInmateMarketLog whereItem($value)
 * @method static Builder|ParsedInmateMarketLog wherePortalInstanceId($value)
 * @method static Builder|ParsedInmateMarketLog wherePrice($value)
 * @method static Builder|ParsedInmateMarketLog whereReceiverAccountUid($value)
 * @method static Builder|ParsedInmateMarketLog whereSourceAccountUid($value)
 * @method static Builder|ParsedInmateMarketLog whereTime($value)
 * @mixin Eloquent
 */
class ParsedInmateMarketLog extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
