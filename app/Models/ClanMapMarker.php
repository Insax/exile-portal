<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ClanMapMarker
 *
 * @property int $id
 * @property int $clan_id
 * @property int $markerType
 * @property string $positionArr
 * @property string $color
 * @property string $icon
 * @property float $iconSize
 * @property string $label
 * @property float $labelSize
 * @property-read \App\Models\Clan $clan
 * @method static \Illuminate\Database\Eloquent\Builder|ClanMapMarker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClanMapMarker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClanMapMarker query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClanMapMarker whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClanMapMarker whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClanMapMarker whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClanMapMarker whereIconSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClanMapMarker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClanMapMarker whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClanMapMarker whereLabelSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClanMapMarker whereMarkerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClanMapMarker wherePositionArr($value)
 * @mixin \Eloquent
 */
class ClanMapMarker extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The connection name for the model.
     *
     * @var string|null
     */
    protected $connection = 'gameserver';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clan_map_marker';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'clan_id' => 'int',
        'markerType' => 'int',
        'iconSize' => 'float',
        'labelSize' => 'float'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'clan_id',
        'markerType',
        'positionArr',
        'color',
        'icon',
        'iconSize',
        'label',
        'labelSize'
    ];

    /**
     * Relationship - ClanMapMarker and Clan
     *
     * N ClanMapMarker belong to 1 Clan
     *
     * @return BelongsTo
     */
    public function clan(): BelongsTo
    {
        return $this->belongsTo(Clan::class);
    }
}
