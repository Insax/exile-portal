<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ContainerPackLog
 *
 * @property int $id
 * @property string $account_uid
 * @property int|null $clan_id
 * @property int|null $container_id
 * @property string $container_pos
 * @property int|null $territory_id
 * @property bool $build_rights
 * @property Carbon $time
 * @property Account $account
 * @property Clan|null $clan
 * @property Container|null $container
 * @property Territory|null $territory
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ContainerPackLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContainerPackLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContainerPackLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContainerPackLog whereAccountUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContainerPackLog whereBuildRights($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContainerPackLog whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContainerPackLog whereContainerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContainerPackLog whereContainerPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContainerPackLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContainerPackLog whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContainerPackLog whereTime($value)
 * @mixin \Eloquent
 */
class ContainerPackLog extends Logging
{
	protected $connection = 'portal';
	protected $table = 'container_pack_logs';
	public $incrementing = false;
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'clan_id' => 'int',
		'container_id' => 'int',
		'territory_id' => 'int',
		'build_rights' => 'bool'
	];

	protected $dates = [
		'time'
	];

    protected $guarded = [];

	public function account(): BelongsTo
	{
		return $this->belongsTo(Account::class, 'account_uid');
	}

	public function clan(): BelongsTo
	{
		return $this->belongsTo(Clan::class)->withTrashed();
	}

	public function container(): BelongsTo
	{
		return $this->belongsTo(Container::class)->withTrashed();
	}

	public function territory(): BelongsTo
	{
		return $this->belongsTo(Territory::class)->withTrashed();
	}

    function toString(): string
    {
        return view('logs.entries.container-pack-log', ['logs' => $this]);
    }
}
