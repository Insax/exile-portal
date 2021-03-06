<?php

namespace App\Jobs;

use App\Models\Territory;
use App\Models\PortalInstance;
use App\Models\TerritoryContainerContent;
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
    private array $tmpArray = array();
    private array $itemArray = array();

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
        TerritoryContainerContent::truncate();
        $allTerritories = Territory::with('containers')->get();


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
