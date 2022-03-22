<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\PortalInstance
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property bool $active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|ParsedInmateMarketLog[] $inmateMarketLogs
 * @property-read int|null $inmate_market_logs_count
 * @method static Builder|PortalInstance newModelQuery()
 * @method static Builder|PortalInstance newQuery()
 * @method static Builder|PortalInstance query()
 * @method static Builder|PortalInstance whereActive($value)
 * @method static Builder|PortalInstance whereCreatedAt($value)
 * @method static Builder|PortalInstance whereId($value)
 * @method static Builder|PortalInstance whereName($value)
 * @method static Builder|PortalInstance whereUpdatedAt($value)
 * @method static Builder|PortalInstance whereUrl($value)
 * @mixin Eloquent
 */
class PortalInstance extends Model
{
    use HasFactory;

    /**
     * The connection name for the model.
     *
     * @var string|null
     */
    protected $connection = 'portal';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'portal_instances';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int',
        'active' => 'bool',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'url'
    ];

    /**
     * Relationship - PortalInstance and ParsedInmateMarketLog
     *
     * 1 PortalInstance can have n ParsedInmateMarketLog
     *
     * @return HasMany
     */
    public function inmateMarketLogs(): HasMany
    {
        return $this->hasMany(ParsedInmateMarketLog::class, 'portal_instance_id', 'id');
    }
}
