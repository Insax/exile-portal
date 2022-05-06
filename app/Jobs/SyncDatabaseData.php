<?php

namespace App\Jobs;

use App\Models\ClanModerator;
use App\Models\Construction;
use App\Models\Container;
use App\Models\GameServerAccount;
use App\Models\GameServerClan;
use App\Models\GameServerConstruction;
use App\Models\GameServerContainer;
use App\Models\GameServerMarxet;
use App\Models\GameServerPlayer;
use App\Models\GameServerPlayerStat;
use App\Models\Account;
use App\Models\Clan;
use App\Models\GameServerSmVirtualgarage;
use App\Models\GameServerTerritory;
use App\Models\GameServerVehicle;
use App\Models\Marxet;
use App\Models\Player;
use App\Models\PlayerStat;
use App\Models\SmVirtualgarage;
use App\Models\Territory;
use App\Models\TerritoryBuilder;
use App\Models\TerritoryMember;
use App\Models\TerritoryModerator;
use App\Models\Vehicle;
use Carbon\Carbon;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncDatabaseData implements ShouldQueue
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
    public function handle(): void
    {
        if(Account::count() != 0) {
            $allAccounts = GameServerAccount::where('last_updated_at', '>', Carbon::now()->subDay())->get();
            $allClans = GameServerClan::where('last_updated_at', '>', Carbon::now()->subDay())->get();
            $allConstructions = GameServerConstruction::where('last_updated_at', '>', Carbon::now()->subDay())->get();
            $allContainers = GameServerContainer::where('last_updated_at', '>', Carbon::now()->subDay())->get();
            $allMarxets = GameServerMarxet::all();
            $allSmVg = GameServerSmVirtualgarage::all();
            $allTerritories = GameServerTerritory::where('last_updated_at', '>', Carbon::now()->subDay())->get();
            $allVehicles = GameServerVehicle::where('last_updated_at', '>', Carbon::now()->subDay())->get();
        } else {
            $allAccounts = GameServerAccount::all();
            $allClans = GameServerClan::all();
            $allConstructions = GameServerConstruction::all();
            $allContainers = GameServerContainer::all();
            $allMarxets = GameServerMarxet::all();
            $allSmVg = GameServerSmVirtualgarage::all();
            $allTerritories = GameServerTerritory::all();
            $allVehicles = GameServerVehicle::all();
        }


        /** Allow invalid Dates to be Inserted */
        DB::statement( DB::raw( "SET SQL_MODE='ALLOW_INVALID_DATES'"));
        /** Sync all accounts */
        foreach ($allAccounts as $account) {
            if($account->uid == 'DMS_PersistentVehicle')
                continue;
            Account::updateOrCreate(['uid' => $account->uid], $account->getAttributes());
        }

        /* Sync all Clans */
        foreach ($allClans as $clan) {
            Clan::withTrashed()->updateOrCreate(['id' => $clan->id], [
                'id' => $clan->id,
                'name' => $clan->name,
                'leader_uid' => $clan->leader_uid,
                'created_at' => $clan->created_at,
                'last_updated_at' => $clan->last_updated_at
            ]);

            /* Renew Clan Moderators */
            ClanModerator::whereClanId($clan->id)->delete();
            foreach ($clan->moderators as $moderator) {
                ClanModerator::create([
                    'clan_id' => $clan->id,
                    'account_uid' => $moderator
                ]);
            }
        }

        foreach ($allConstructions as $construction) {
            Construction::withTrashed()->updateOrCreate(['id' => $construction->id], $construction->getAttributes());
        }

        foreach ($allContainers as $container) {
            Container::withTrashed()->updateOrCreate(['id' => $container->id], $container->getAttributes());
        }

        foreach ($allMarxets as $allMarxet) {
            Marxet::updateOrCreate(['listingID' => $allMarxet->listingId], $allMarxet->getAttributes());
        }

        foreach ($allSmVg as $item) {
            SmVirtualgarage::updateOrCreate(['id' => $item->id], $item->getAttributes());
        }

        foreach ($allTerritories as $territory) {
            Territory::withTrashed()->updateOrCreate(['id' => $territory->id], [
                'id' => $territory->id,
                'esm_custom_id' => $territory->esm_custom_id,
                'owner_uid' => $territory->owner_uid,
                'name' => $territory->name,
                'position_x' => $territory->position_x,
                'position_y' => $territory->position_y,
                'position_z' => $territory->position_z,
                'radius' => $territory->radius,
                'level' => $territory->level,
                'flag_texture' => $territory->flag_texture,
                'flag_stolen' => $territory->flag_stolen,
                'flag_stolen_by_uid' => $territory->flag_stolen_by_uid,
                'flag_stolen_at' => $territory->flag_stolen_at,
                'created_at' => $territory->created_at,
                'last_paid_at' => $territory->last_paid_at,
                'xm8_protectionmoney_notified' => $territory->xm8_protectionmoney_notified,
                'esm_payment_counter' => $territory->esm_payment_counter,
                'deleted_at' => $territory->deleted_at,
                'territory_permissions' => $territory->territory_permissions,
                'last_updated_at' => $territory->last_updated_at
            ]);

            $territoryMembers = array();
            TerritoryModerator::whereTerritoryId($territory->id)->delete();
            foreach ($territory->moderators as $moderator) {
                if(empty($moderator))
                    continue;
                $territoryMembers[] = $moderator;
                TerritoryModerator::create([
                    'territory_id' => $territory->id,
                    'account_uid' => $moderator
                ]);
            }

            TerritoryBuilder::whereTerritoryId($territory->id)->delete();
            foreach ($territory->build_rights as $build_right) {
                if(empty($build_right))
                    continue;
                $territoryMembers[] = $build_right;
                TerritoryBuilder::create([
                    'territory_id' => $territory->id,
                    'account_uid' => $build_right
                ]);
            }

            $territoryMembers[] = $territory->owner_uid;
            $territoryMembers = array_unique($territoryMembers);

            TerritoryMember::whereTerritoryId($territory->id)->delete();
            foreach ($territoryMembers as $member) {
                TerritoryMember::create([
                    'territory_id' => $territory->id,
                    'account_uid' => $member
                ]);
            }
        }

        foreach ($allVehicles as $vehicle) {
            Vehicle::withTrashed()->updateOrCreate(['id' => $vehicle->id], $vehicle->getAttributes());
        }
    }
}
