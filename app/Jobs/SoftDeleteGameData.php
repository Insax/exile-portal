<?php

namespace App\Jobs;

use App\Models\Account;
use App\Models\Clan;
use App\Models\ClanModerator;
use App\Models\Construction;
use App\Models\Container;
use App\Models\GameServerAccount;
use App\Models\GameServerClan;
use App\Models\GameServerConstruction;
use App\Models\GameServerContainer;
use App\Models\GameServerMarxet;
use App\Models\GameServerSmVirtualgarage;
use App\Models\GameServerTerritory;
use App\Models\GameServerVehicle;
use App\Models\Marxet;
use App\Models\SmVirtualgarage;
use App\Models\Territory;
use App\Models\TerritoryBuilder;
use App\Models\TerritoryMember;
use App\Models\TerritoryModerator;
use App\Models\Vehicle;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SoftDeleteGameData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 600;

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
    public function handle(): void
    {
        $allPortalClans = Clan::all();
        $allClans = GameServerClan::all();
        $allPortalConstructions = Construction::all();
        $allConstructions = GameServerConstruction::all();
        $allPortalContainers = Container::all();
        $allContainers = GameServerContainer::all();
        $allPortalMarxets = Marxet::all();
        $allMarxets = GameServerMarxet::all();
        $allPortalSmVg = SmVirtualgarage::all();
        $allSmVg = GameServerSmVirtualgarage::all();
        $allPortalTerritories = Territory::all();
        $allTerritories = GameServerTerritory::all();
        $allPortalVehicles = Vehicle::all();
        $allVehicles = GameServerVehicle::all();

        /** Allow invalid Dates to be Inserted */
        DB::statement(DB::raw("SET SQL_MODE='ALLOW_INVALID_DATES'"));

        $this->findAndSoftDeleteDeprecates($allPortalClans, $allClans);
        $this->findAndSoftDeleteDeprecates($allPortalConstructions, $allConstructions);
        $this->findAndSoftDeleteDeprecates($allPortalContainers, $allContainers);
        $this->findAndSoftDeleteDeprecates($allPortalMarxets, $allMarxets, 'listingID');
        $this->findAndSoftDeleteDeprecates($allPortalSmVg, $allSmVg);
        $this->findAndSoftDeleteDeprecates($allPortalTerritories, $allTerritories);
        $this->findAndSoftDeleteDeprecates($allPortalVehicles, $allVehicles);
    }

    private function findAndSoftDeleteDeprecates(Collection $portalItems, Collection $items, $primaryKeyName = 'id')
    {
        foreach ($portalItems as $portalItem) {
            $found = false;
            foreach ($items as $item) {
                if($portalItem->$primaryKeyName == $item->$primaryKeyName) {
                    $found = true;
                    break;
                }
            }

            if(!$found) {
                $portalItem->delete();
            }
        }
    }
}
