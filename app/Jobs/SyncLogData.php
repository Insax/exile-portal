<?php

namespace App\Jobs;

use App\Models\AccountMoneySpent;
use App\Models\AntiTeleportLog;
use App\Models\BreachingLog;
use App\Models\ChatLog;
use App\Models\ContainerPackLog;
use App\Models\CraftingLog;
use App\Models\DisconnectPositionLog;
use App\Models\FamilyLog;
use App\Models\FlagHackingLog;
use App\Models\GameServerLoggingAntiTp;
use App\Models\GameServerLoggingBreaching;
use App\Models\GameServerLoggingChat;
use App\Models\GameServerLoggingContainerPack;
use App\Models\GameServerLoggingCrafting;
use App\Models\GameServerLoggingDisconnectPosition;
use App\Models\GameServerLoggingFamily;
use App\Models\GameServerLoggingFlaghacking;
use App\Models\GameServerLoggingGlitch;
use App\Models\GameServerLoggingGrinding;
use App\Models\GameServerLoggingHacklog;
use App\Models\GameServerLoggingHotwire;
use App\Models\GameServerLoggingInmateMarket;
use App\Models\GameServerLoggingLoadoutTrader;
use App\Models\GameServerLoggingLock;
use App\Models\GameServerLoggingLocker;
use App\Models\GameServerLoggingParty;
use App\Models\GameServerLoggingPlayerKill;
use App\Models\GameServerLoggingPoptab;
use App\Models\GameServerLoggingSafehacking;
use App\Models\GameServerLoggingSafezone;
use App\Models\GameServerLoggingTerritory;
use App\Models\GameServerLoggingThermalscanner;
use App\Models\GameServerLoggingTrade;
use App\Models\GameServerLoggingVehicleDestroyed;
use App\Models\GameServerLoggingVg;
use App\Models\GlitchLog;
use App\Models\GrindingLog;
use App\Models\HackLog;
use App\Models\HotwireLog;
use App\Models\InmateMarketLog;
use App\Models\LoadoutTraderLog;
use App\Models\LockerLog;
use App\Models\LockLog;
use App\Models\PartyLog;
use App\Models\PlayerKillLog;
use App\Models\PoptabLog;
use App\Models\ReadableLogging;
use App\Models\SafeHackingLog;
use App\Models\SafeZoneLog;
use App\Models\ServerRaidTime;
use App\Models\TerritoryLog;
use App\Models\TerritoryRaidTime;
use App\Models\ThermalScannerLog;
use App\Models\TradeLog;
use App\Models\VehicleDestroyedLog;
use App\Models\VirtualGarageLog;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncLogData implements ShouldQueue
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
        $antiTpLogMax = (int)AntiTeleportLog::max('id');
        $antiTpLogs = GameServerLoggingAntiTp::where('id', '>', $antiTpLogMax)->orderBy('id', 'ASC')->get();

        $breachingLogMax = (int)BreachingLog::max('id');
        $breachLogs = GameServerLoggingBreaching::where('id', '>', $breachingLogMax)->orderBy('id', 'ASC')->get();

        $chatLogMax = (int)ChatLog::max('id');
        $chatLogs = GameServerLoggingChat::where('id', '>', $chatLogMax);

        $containerPackLogMax = (int)ContainerPackLog::max('id');
        $containerPackLogs = GameServerLoggingContainerPack::where('id', '>', $containerPackLogMax)->orderBy('id', 'ASC')->get();

        $craftingLogMax = (int)CraftingLog::max('id');
        $craftingLogs = GameServerLoggingCrafting::where('id', '>', $craftingLogMax)->orderBy('id', 'ASC')->get();

        $disconnectLogMax = (int)DisconnectPositionLog::max('id');
        $disconnectLogs = GameServerLoggingDisconnectPosition::where('id', '>', $disconnectLogMax)->orderBy('id', 'ASC')->get();

        $familyLogMax = (int)FamilyLog::max('id');
        $familyLogs = GameServerLoggingFamily::where('id', '>', $familyLogMax)->orderBy('id', 'ASC')->get();

        $flagHackingLogMax = (int)FlagHackingLog::max('id');
        $flagHackingLogs = GameServerLoggingFlaghacking::where('id', '>', $flagHackingLogMax)->orderBy('id', 'ASC')->get();

        $glitchLogMax = (int)GlitchLog::max('id');
        $glitchLogs = GameServerLoggingGlitch::where('id', '>', $glitchLogMax)->orderBy('id', 'ASC')->get();

        $grindingLogMax = (int)GrindingLog::max('id');
        $grindingLogs = GameServerLoggingGrinding::where('id', '>', $grindingLogMax)->orderBy('id', 'ASC')->get();

        $hackLogMax = (int)HackLog::max('id');
        $hackLogs = GameServerLoggingHacklog::where('id', '>', $hackLogMax)->orderBy('id', 'ASC')->get();

        $hotwireLogMax = (int)HotwireLog::max('id');
        $hotwireLogs = GameServerLoggingHotwire::where('id', '>', $hotwireLogMax)->orderBy('id', 'ASC')->get();

        $inmateMarketLogMax = (int)InmateMarketLog::max('id');
        $inmateMarketLogs = GameServerLoggingInmateMarket::where('id', '>', $inmateMarketLogMax)->orderBy('id', 'ASC')->get();

        $loadoutTraderLogMax = (int)LoadoutTraderLog::max('id');
        $loadoutTraderLogs = GameServerLoggingLoadoutTrader::where('id', '>', $loadoutTraderLogMax)->orderBy('id', 'ASC')->get();

        $lockLogMax = (int)LockLog::max('id');
        $lockLogs = GameServerLoggingLock::where('id', '>', $lockLogMax)->orderBy('id', 'ASC')->get();

        $lockerLogMax = (int)LockerLog::max('id');
        $lockerLogs = GameServerLoggingLocker::where('id', '>', $lockerLogMax)->orderBy('id', 'ASC')->get();

        $partyLogMax = (int)PartyLog::max('id');
        $partyLogs = GameServerLoggingParty::where('id', '>', $partyLogMax)->orderBy('id', 'ASC')->get();

        $playerKillLogMax = (int)PlayerKillLog::max('id');
        $playerKillLogs = GameServerLoggingPlayerKill::where('id', '>', $playerKillLogMax)->orderBy('id', 'ASC')->get();

        $poptabLogMax = (int)PoptabLog::max('id');
        $poptabLogs = GameServerLoggingPoptab::where('id', '>', $poptabLogMax)->orderBy('id', 'ASC')->get();

        $safeHackingLogMax = (int)SafeHackingLog::max('id');
        $safeHackingLogs = GameServerLoggingSafehacking::where('id', '>', $safeHackingLogMax)->orderBy('id', 'ASC')->get();

        $safeZoneLogMax = (int)SafeZoneLog::max('id');
        $safeZoneLogs = GameServerLoggingSafezone::where('id', '>', $safeZoneLogMax)->orderBy('id', 'ASC')->get();

        $territoryLogMax = (int)TerritoryLog::max('id');
        $territoryLogs = GameServerLoggingTerritory::where('id', '>', $territoryLogMax)->orderBy('id', 'ASC')->get();

        $thermalScanLogMax = (int)ThermalScannerLog::max('id');
        $thermalScanLogs = GameServerLoggingThermalscanner::where('id', '>', $thermalScanLogMax)->orderBy('id', 'ASC')->get();

        $tradeLogMax = (int)TradeLog::max('id');
        $tradeLogs = GameServerLoggingTrade::where('id', '>', $tradeLogMax)->orderBy('id', 'ASC')->get();

        $vehicleDestroyedLogMax = (int)VehicleDestroyedLog::max('id');
        $vehicleDestroyedLogs = GameServerLoggingVehicleDestroyed::where('id', '>', $vehicleDestroyedLogMax)->orderBy('id', 'ASC')->get();

        $virtualGarageLogMax = (int)VirtualGarageLog::max('id');
        $virtualGarageLogs = GameServerLoggingVg::where('id', '>', $virtualGarageLogMax)->orderBy('id', 'ASC')->get();

        foreach ($antiTpLogs as $log) {
            $loggable = AntiTeleportLog::create([
                'id' => $log->id,
                'account_uid' => $log->player_id,
                'distance' => $log->distance,
                'new_pos' => $log->new_pos,
                'old_pos' => $log->old_pos,
                'time' => $log->time,
                'tp_count' => $log->tp_count,
                'vehicle_class' => $log->class
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'type' => 'ANTI_TP_LOG',
                'territory_id' => null,
                'clan_id' => null,
                'loggable_id' => $loggable->id,
                'loggable_type' => $log::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($breachLogs as $log) {
            $loggable = BreachingLog::create([
                'id' => $log->id,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'action' => $log->action,
                'construction_id' => $log->construction_id,
                'territory_id' => $log->territory_id,
                'position' => $log->position,
                'charge_class' => $log->charge_class,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => $loggable->territory_id,
                'type' => 'BREACHING_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($chatLogs as $log) {
            $loggable = ChatLog::create([
                'id' => $log->id,
                'sender_uid' => $log->sender_id,
                'recipient_uid' => $log->receiver_id,
                'message' => $log->message,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->sender_uid,
                'clan_id' => null,
                'territory_id' => null,
                'type' => 'CHAT_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
            ReadableLogging::create([
                'account_uid' => $loggable->recipient_uid,
                'clan_id' => null,
                'territory_id' => null,
                'type' => 'CHAT_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($containerPackLogs as $log) {
            $loggable = ContainerPackLog::create([
                'id' => $log->id,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'container_id' => $log->container_id,
                'territory_id' => $log->territory_id,
                'container_pos' => $log->container_pos,
                'build_rights' => $log->build_rights,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => $loggable->territory_id,
                'type' => 'CONTAINER_PACK_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($craftingLogs as $log) {
            $loggable = CraftingLog::create([
                'id' => $log->id,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'player_pos' => $log->player_pos,
                'recipe_class_name' => $log->recipe_class_name,
                'amount' => $log->amount,
                'components' => $log->components,
                'returned_item_class' => $log->returned_item_class,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => null,
                'type' => 'CRAFTING_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($disconnectLogs as $log) {
            $loggable = DisconnectPositionLog::create([
                'id' => $log->id,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'player_pos' => $log->player_pos,
                'territory_id' => $log->territory_id,
                'build_rights' => $log->build_rights,
                'player_is_alive' => $log->player_is_alive,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => $loggable->territory_id,
                'type' => 'DISCONNECT_POSITION_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($familyLogs as $log) {
            $loggable = FamilyLog::create([
                'id' => $log->id,
                'action' => $log->action,
                'source_account_uid' => $log->source_account_id,
                'target_account_uid' => $log->target_account_id,
                'clan_id' => $log->clan_id,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->source_account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => null,
                'type' => 'FAMILY_LOGS',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);

            if($loggable->target_account_uid)
                ReadableLogging::create([
                    'account_uid' => $loggable->target_account_uid,
                    'clan_id' => $loggable->clan_id,
                    'territory_id' => null,
                    'type' => 'FAMILY_LOGS',
                    'loggable_id' => $loggable->id,
                    'loggable_type' => $loggable::class,
                    'created_at' => $loggable->time
                ]);
        }

        foreach ($flagHackingLogs as $log) {
            $loggable = FlagHackingLog::create([
                'id' => $log->id,
                'action' => $log->action,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'territory_id' => $log->territory_id,
                'player_pos' => $log->player_pos,
                'attempts' => $log->attempts,
                'reward_vehicle_class' => $log->reward_vehicle_class,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => $loggable->territory_id,
                'type' => 'FLAG_HACKING_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($glitchLogs as $log) {
            $loggable = GlitchLog::create([
                'id' => $log->id,
                'action' => $log->action,
                'account_uid' => $log->player_id,
                'construction_id' => $log->object_id,
                'pos' => $log->pos,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => null,
                'territory_id' => null,
                'type' => 'GLITCH_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($grindingLogs as $log) {
            $loggable = GrindingLog::create([
                'id' => $log->id,
                'action' => $log->action,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'territory_id' => $log->territory_id,
                'construction_id' => $log->construction_id,
                'player_pos' => $log->player_pos,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => $loggable->territory_id,
                'type' => 'GRINDING_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($hackLogs as $log) {
            $loggable = HackLog::create([
                'id' => $log->id,
                'action' => $log->action,
                'new_account_uid' => $log->new_id,
                'old_account_uid' => $log->old_id,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->new_account_uid,
                'clan_id' => null,
                'territory_id' => null,
                'type' => 'HACK_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->old_account_uid,
                'clan_id' => null,
                'territory_id' => null,
                'type' => 'HACK_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($hotwireLogs as $log) {
            $loggable = HotwireLog::create([
                'id' => $log->id,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'territory_id' => $log->territory_id,
                'vehicle_id' => $log->vehicle_id,
                'player_pos' => $log->player_pos,
                'vehicle_class' => $log->vehicle_class,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => $loggable->territory_id,
                'type' => 'HOTWIRE_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($inmateMarketLogs as $log) {
            $loggable = InmateMarketLog::create([
                'id' => $log->id,
                'buyer_account_uid' => $log->buyer_id,
                'seller_account_uid' => $log->seller_id,
                'price' => $log->price,
                'item_class' => $log->item_class,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->buyer_account_uid,
                'clan_id' => null,
                'territory_id' => null,
                'type' => 'INMATE_MARKET_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->seller_account_uid,
                'clan_id' => null,
                'territory_id' => null,
                'type' => 'INMATE_MARKET_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);

            AccountMoneySpent::create([
                'account_uid' => $loggable->buyer_account_uid,
                'amount' => $loggable->price,
                'time' => $loggable->time
            ]);
        }

        foreach ($loadoutTraderLogs as $log) {
            $loggable = LoadoutTraderLog::create([
                'id' => $log->id,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'price' => $log->price,
                'loadout' => $log->loadout,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => null,
                'type' => 'LOADOUT_TRADER_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);

            AccountMoneySpent::create([
                'account_uid' => $loggable->account_uid,
                'amount' => $loggable->price,
                'time' => $loggable->time
            ]);
        }

        foreach ($lockLogs as $log) {
            $loggable = LockLog::create([
                'id' => $log->id,
                'action' => $log->action,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'territory_id' => $log->territory_id,
                'player_pos' => $log->player_pos,
                'build_rights' => $log->build_rights,
                'lockable_id' => $log->object_id,
                'lockable_type' => $log->object_type,
                'pin_code' => $log->pin_code,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => $loggable->territory_id,
                'type' => 'LOCK_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($lockerLogs as $log) {
            $loggable = LockerLog::create([
                'id' => $log->id,
                'action' => $log->action,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'amount' => $log->amount,
                'locker_before' => $log->locker_before,
                'locker_after' => $log->locker_before,
                'player_before' => $log->player_before,
                'player_after' => $log->player_after
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => null,
                'type' => 'LOCKER_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($partyLogs as $log) {
            $loggable = PartyLog::create([
                'id' => $log->id,
                'action' => $log->action,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'invited_account_uid' => $log->invited_player_id,
                'invited_player_clan_id' => $log->invited_player_clan_id,
                'group_name' => $log->group_name,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->invited_player_clan_id,
                'territory_id' => null,
                'type' => 'PARTY_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);

            if($loggable->invited_player_clan_id)
                ReadableLogging::create([
                    'account_uid' => $loggable->invited_account_uid,
                    'clan_id' => $loggable->clan_id,
                    'territory_id' => null,
                    'type' => 'PARTY_LOG',
                    'loggable_id' => $loggable->id,
                    'loggable_type' => $loggable::class,
                    'created_at' => $loggable->time
                ]);

            if($loggable->invited_player_clan_id)
                ReadableLogging::create([
                    'account_uid' => $loggable->invited_account_uid,
                    'clan_id' => $loggable->invited_player_clan_id,
                    'territory_id' => null,
                    'type' => 'PARTY_LOG',
                    'loggable_id' => $loggable->id,
                    'loggable_type' => $loggable::class,
                    'created_at' => $loggable->time
                ]);
        }

        foreach ($playerKillLogs as $log) {
            $loggable = PlayerKillLog::create([
                'id' => $log->id,
                'killer_account_uid' => $log->killer_id,
                'killer_clan_id' => $log->killer_clan_id,
                'killer_pos' => $log->killer_pos,
                'victim_account_uid' => $log->victim_id,
                'victim_clan_id' => $log->victim_clan_id,
                'victim_pos' => $log->victim_pos,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->killer_account_uid,
                'clan_id' => $loggable->killer_clan_id,
                'territory_id' => null,
                'type' => 'PLAYER_KILL_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->victim_account_uid,
                'clan_id' => $loggable->victim_clan_id,
                'territory_id' => null,
                'type' => 'PLAYER_KILL_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->killer_account_uid,
                'clan_id' => $loggable->victim_clan_id,
                'territory_id' => null,
                'type' => 'PLAYER_KILL_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->victim_account_uid,
                'clan_id' => $loggable->killer_clan_id,
                'territory_id' => null,
                'type' => 'PLAYER_KILL_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($poptabLogs as $log) {
            $loggable = PoptabLog::create([
                'id' => $log->id,
                'action' => $log->action,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'amount' => $log->amount,
                'player_before' => $log->player_before,
                'player_after' => $log->player_after,
                'player_pos' => $log->player_pos,
                'container_before' => $log->container_before,
                'container_after' => $log->container_after,
                'container_class' => $log->container_class,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => null,
                'type' => 'POPTAB_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($safeHackingLogs as $log) {
            $loggable = SafeHackingLog::create([
                'id' => $log->id,
                'action' => $log->action,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'territory_id' => $log->territory_id,
                'container_id' => $log->container_id,
                'player_pos' => $log->player_pos,
                'hack_attempts' => $log->hack_attempts,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => $loggable->territory_id,
                'type' => 'SAFE_HACK_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($safeZoneLogs as $log) {
            $loggable = SafeZoneLog::create([
                'id' => $log->id,
                'action' => $log->action,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'player_pos' => $log->player_pos,
                'vehicle_id' => $log->vehicle_id,
                'vehicle' => $log->vehicle,
                'vehicle_owner_uid' => $log->vehicle_owner,
                'vehicle_owner_clan_id' => $log->vehicle_owner_clan_id,
                'vehicle_pos' => $log->vehicle_pos,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => null,
                'type' => 'SAFEZONE_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($territoryLogs as $log) {
            $loggable = TerritoryLog::create([
                'id' => $log->id,
                'action' => $log->action,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'target_account_uid' => $log->target_id,
                'territory_id' => $log->territory_id,
                'player_pos' => $log->player_pos,
                'fee' => $log->fee,
                'poptabs_before' => $log->poptabs_before,
                'poptabs_after' => $log->poptabs_after,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => $loggable->territory_id,
                'type' => 'TERRITORY_LOGS',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);

            if($loggable->target_account_uid)
                ReadableLogging::create([
                    'account_uid' => $loggable->target_account_uid,
                    'clan_id' => $loggable->clan_id,
                    'territory_id' => $loggable->territory_id,
                    'type' => 'TERRITORY_LOGS',
                    'loggable_id' => $loggable->id,
                    'loggable_type' => $loggable::class,
                    'created_at' => $loggable->time
                ]);

            $territoryRaidMode = TerritoryLog::where('time', '>', Carbon::now())->whereAction('Raidmode')->whereTerritoryId($loggable->territory_id)->count();
            if($territoryRaidMode) {
                TerritoryRaidTime::create([
                    'territory_id' => $loggable->territory_id,
                    'raid_mode' => true,
                    'time' => Carbon::now()
                ]);
            }
        }

        $raidModeActiveCount = TerritoryLog::where('time', '>', Carbon::now())->whereAction('Raidmode')->count();
        ServerRaidTime::create([
            'raid_count' => $raidModeActiveCount,
            'time' => Carbon::now()
        ]);

        foreach ($thermalScanLogs as $log) {
            $loggable = ThermalScannerLog::create([
                'id' => $log->id,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'territory_id' => $log->territory_id,
                'player_pos' => $log->player_pos,
                'pin_code' => $log->pin_code,
                'has_rights' => $log->has_rights,
                'scanable_id' => $log->object_id,
                'scanable_type' => $log->object_type,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => $loggable->territory_id,
                'type' => 'THERMAL_SCAN_LOGS',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }

        foreach ($tradeLogs as $log) {
            $loggable = TradeLog::create([
                'id' => $log->id,
                'action' => $log->action,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'item_class' => $log->class,
                'quantity' => $log->quantity,
                'vehicle_id' => $log->vehicle_id,
                'container_content' => $log->container_content,
                'price' => $log->price,
                'sell_respect' => $log->sell_respect,
                'poptabs_after' => $log->poptabs_after,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => null,
                'type' => 'TRADER_LOGS',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);

            if($loggable->action == 'PurchaseVehicle' || $loggable->action == 'PurchaseItem') {
                AccountMoneySpent::create([
                    'account_uid' => $loggable->account_uid,
                    'amount' => $loggable->price,
                    'time' => $loggable->time
                ]);
            }
        }

        foreach ($vehicleDestroyedLogs as $log) {
            $loggable = VehicleDestroyedLog::create([
                'id' => $log->id,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'vehicle_id' => $log->vehicle_id,
                'vehicle_class' => $log->vehicle_class,
                'player_pos' => $log->player_pos,
                'vehicle_pos' => $log->vehicle_pos,
                'time' => $log->time
            ]);

            if(!empty($loggable->account_uid))
                ReadableLogging::create([
                    'account_uid' => $loggable->account_uid,
                    'clan_id' => $loggable->clan_id,
                    'territory_id' => null,
                    'type' => 'VEHICLE_DESTROYED_LOG',
                    'loggable_id' => $loggable->id,
                    'loggable_type' => $loggable::class,
                    'created_at' => $loggable->time
                ]);
        }

        foreach ($virtualGarageLogs as $log) {
            $loggable = VirtualGarageLog::create([
                'id' => $log->id,
                'action' => $log->action,
                'account_uid' => $log->player_id,
                'clan_id' => $log->clan_id,
                'nickname' => $log->nickname,
                'vehicle_id' => $log->vehicle_id,
                'vehicle_class' => $log->vehicle_class,
                'vehicle_pos' => $log->vehicle_pos,
                'territory_id' => $log->flag_id,
                'time' => $log->time
            ]);

            ReadableLogging::create([
                'account_uid' => $loggable->account_uid,
                'clan_id' => $loggable->clan_id,
                'territory_id' => $loggable->territory_id,
                'type' => 'VIRTUAL_GARAGE_LOG',
                'loggable_id' => $loggable->id,
                'loggable_type' => $loggable::class,
                'created_at' => $loggable->time
            ]);
        }
    }
}
