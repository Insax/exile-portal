<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
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
 * @property-read Clan $clan
 * @method static Builder|ClanMapMarker newModelQuery()
 * @method static Builder|ClanMapMarker newQuery()
 * @method static Builder|ClanMapMarker query()
 * @method static Builder|ClanMapMarker whereClanId($value)
 * @method static Builder|ClanMapMarker whereColor($value)
 * @method static Builder|ClanMapMarker whereIcon($value)
 * @method static Builder|ClanMapMarker whereIconSize($value)
 * @method static Builder|ClanMapMarker whereId($value)
 * @method static Builder|ClanMapMarker whereLabel($value)
 * @method static Builder|ClanMapMarker whereLabelSize($value)
 * @method static Builder|ClanMapMarker whereMarkerType($value)
 * @method static Builder|ClanMapMarker wherePositionArr($value)
 * @mixin Eloquent
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
