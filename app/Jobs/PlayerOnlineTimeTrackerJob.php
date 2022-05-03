<?php

namespace App\Jobs;

use App\Models\Account;
use App\Models\AccountOnlineTime;
use App\Models\ClanOnlineTime;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PlayerOnlineTimeTrackerJob implements ShouldQueue
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
        $accounts = Account::whereColumn('last_connect_at', '>', 'last_disconnect_at')->get();

        foreach ($accounts as $account) {
            AccountOnlineTime::create([
                'account_uid' => $account->uid,
                'time' => Carbon::now(),
                'online' => true
            ]);
        }


        foreach (Account::selectRaw('clan_id, count(*) as online_players')->whereColumn('last_connect_at', '>', 'last_disconnect_at')->groupBy('clan_id')->get() as $account) {
            ClanOnlineTime::create([
                'clan_id' => $account->clan_id,
                'online_count' => $account->online_players,
                'time' => Carbon::now()
            ]);
        }

        /**
        $teritoryMembers = array();
        foreach (Account::whereColumn('last_connect_at', '>', 'last_disconnect_at')->get() as $account) {
            foreach ($account->territoryMember as $territoryMember) {
                $territoryMember->territory
            }
        }
         */

    }
}
