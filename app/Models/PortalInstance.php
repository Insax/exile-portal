<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

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

    public function adminLog(): HasMany
    {
        return $this->hasMany(AdminLog::class, 'portal_instance_id');
    }

    /**
     * @return HasMany
     */
    public function antiTpLog(): HasMany
    {
        return $this->hasMany(AntiTPLog::class, 'portal_instance_id');
    }

    /**
     * @return HasMany
     */
    public function banLog(): HasMany
    {
        return $this->hasMany(BanLog::class, 'portal_instance_id');
    }

    /**
     * @return HasMany
     */
    public function breachingLog(): HasMany
    {
        return $this->hasMany(BreachingLog::class, 'portal_instance_id');
    }

    /**
     * @return PortalInstance|null
     */
    public static function getCurrentPortalInstance(): self|null
    {
        return self::whereName(config('portal.instanceName'))->whereActive(true)->first();
    }
}
