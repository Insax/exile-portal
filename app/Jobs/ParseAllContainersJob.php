<?php

namespace App\Jobs;

use App\Models\PortalInstance;
use App\Models\Game\Territory;
use App\Models\ParsedGameInformation\TerritoryContainerContent;
use Cache;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ParseAllContainersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private int $itemCount = 0;
    private $tmpArray = array();
    private $itemArray = array();

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

        /** @var int $currentInstance Needed for inserting */
        $currentInstance = Cache::rememberForever('portalInstanceId', function () {
            return PortalInstance::whereName(config('portal.instanceName'))->first()->id;
        });

        TerritoryContainerContent::wherePortalInstanceId($currentInstance)->delete();

        $allTerritories = Cache::remember('allTerritoriesWithContainers', 5 * 60, function () {
            return Territory::with('containers')->get();
        });

        foreach ($allTerritories as $territory) {
            foreach ($territory->containers as $container) {
                $cargoItems = json_decode($container->cargo_items);
                array_walk_recursive($cargoItems, array($this, 'countCargoItems'));

                $cargoMagazines = json_decode($container->cargo_magazines);
                array_walk_recursive($cargoMagazines, array($this, 'countCargoMagazines'));

                $cargoWeapons = json_decode($container->cargo_weapons);
                array_walk_recursive($cargoWeapons, array($this, 'countCargoWeapons'));

                $cargoContainers = json_decode($container->cargo_container);
                array_walk_recursive($cargoContainers, array($this, 'countCargoContainers'));
            }

            foreach ($this->itemArray as $item => $count) {
                TerritoryContainerContent::create([
                    'portal_instance_id' => $currentInstance,
                    'territory_id' => $territory->id,
                    'item' => $item,
                    'count' => $count
                ]);
            }
            $this->itemArray = array();
        }
    }


    public function countCargoContainers($item)
    {
        if (is_string($item) && !empty($item)) {
            if (key_exists($item, $this->itemArray))
                $this->itemArray[$item]++;
            else
                $this->itemArray[$item] = 1;
        }
    }

    public function countCargoWeapons($item)
    {
        if (is_string($item) && !empty($item)) {
            if (key_exists($item, $this->itemArray))
                $this->itemArray[$item]++;
            else
                $this->itemArray[$item] = 1;
        }
    }

    public function countCargoMagazines($item)
    {
        if (is_string($item)) {
            if (key_exists($item, $this->itemArray))
                $this->itemArray[$item]++;
            else
                $this->itemArray[$item] = 1;
        }
    }

    public function countCargoItems($item, $key)
    {
        if (is_string($item)) {
            $this->itemCount++;
            $this->tmpArray[$key] = [
                'item' => $item,
                'count' => 0
            ];
        }

        if (is_int($item)) {
            $this->itemCount--;
            $this->tmpArray[$key]['count'] = $item;
        }

        if (!$this->itemCount) {
            foreach ($this->tmpArray as $entries) {
                if (key_exists($entries['item'], $this->itemArray)) {
                    $this->itemArray[$entries['item']] += $entries['count'];
                } else {
                    $this->itemArray[$entries['item']] = $entries['count'];
                }
            }
            $this->tmpArray = array();
        }
    }
}
