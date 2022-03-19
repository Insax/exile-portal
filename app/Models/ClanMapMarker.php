<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
