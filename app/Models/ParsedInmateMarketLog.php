<?php

namespace App\Models;

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
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedInmateMarketLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedInmateMarketLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedInmateMarketLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedInmateMarketLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedInmateMarketLog whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedInmateMarketLog wherePortalInstanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedInmateMarketLog wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedInmateMarketLog whereReceiverAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedInmateMarketLog whereSourceAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParsedInmateMarketLog whereTime($value)
 * @mixin \Eloquent
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
