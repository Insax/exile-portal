<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
