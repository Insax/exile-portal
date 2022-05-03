<?php

namespace App\Jobs;

use App\Models\Construction;
use App\Models\ConstructionCountTime;
use App\Models\Container;
use App\Models\ContainerCountTime;
use App\Models\Territory;
use App\Models\TerritoryConstructionCountTime;
use App\Models\TerritoryContainerContent;
use App\Models\TerritoryContainerCountTime;
use App\Models\TerritoryItemCountTime;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ConstructionCountTracker implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $count = Construction::count();

        ConstructionCountTime::create([
            'construction_count' => $count,
            'time' => Carbon::now()
        ]);

        $count = Container::count();
        ContainerCountTime::create([
            'container_count' => $count,
            'time' => Carbon::now()
        ]);

        $territoryConstructionCount = Construction::selectRaw('territory_id, COUNT(*) as count')->groupBy('territory_id')->get();

        foreach ($territoryConstructionCount as $count) {
            TerritoryConstructionCountTime::create([
                'construction_count' => $count->count,
                'territory_id' => $count->territory_id,
                'time' => Carbon::now()
            ]);
        }

        $territoryContainerCount = Container::selectRaw('territory_id, COUNT(*) as count')->groupBy('territory_id')->get();

        foreach ($territoryContainerCount as $count) {
            TerritoryContainerCountTime::create([
                'construction_count' => $count->count,
                'territory_id' => $count->territory_id,
                'time' => Carbon::now()
            ]);
        }

        $territoryItemCount = TerritoryContainerContent::selectRaw('territory_id, SUM(count) as count')->groupBy('territory_id')->get();

        foreach ($territoryItemCount as $items) {
            TerritoryItemCountTime::create([
                'territory_id' => $items->territory_id,
                'item_count' => $items->count,
                'time' => Carbon::now()
            ]);
        }
    }
}
