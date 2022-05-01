<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PortalInstance
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PortalInstance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PortalInstance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PortalInstance query()
 * @method static \Illuminate\Database\Eloquent\Builder|PortalInstance whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortalInstance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortalInstance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortalInstance whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortalInstance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortalInstance whereUrl($value)
 * @mixin \Eloquent
 */
class PortalInstance extends Model
{
    protected $connection = 'authentication';
    protected $fillable = [
        'name',
        'url',
        'active'
    ];
}
