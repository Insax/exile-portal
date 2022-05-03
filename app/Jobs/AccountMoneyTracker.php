<?php

namespace App\Jobs;

use App\Models\Account;
use App\Models\AccountMoney;
use App\Models\Clan;
use App\Models\ClanMoney;
use App\Models\Container;
use App\Models\ServerMoney;
use App\Models\TerritoryMoney;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AccountMoneyTracker implements ShouldQueue
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
        $accounts = Account::get();

        $serverMoney = Account::sum('locker') + Account::sum('marxet_locker') + Container::sum('money');

        ServerMoney::create([
            'money' => $serverMoney,
            'time' => Carbon::now()
        ]);

        foreach ($accounts as $account) {
            AccountMoney::create([
                'account_uid' => $account->uid,
                'money' => $account->locker + $account->marxet_locker,
                'time' => Carbon::now()
            ]);
        }

        $clanMoneyAccounts = Account::selectRaw('(SUM(locker) + SUM(marxet_locker)) as money, clan_id')->whereNotNull('clan_id')->groupBy('clan_id')->get();
        foreach ($clanMoneyAccounts as $account) {
            ClanMoney::create([
                'clan_id' => $account,
                'money' => $account->money,
                'time' => Carbon::now()
            ]);
        }

        $territoryMoney = Account::selectRaw('(SUM(locker) + SUM(marxet_locker)) as money, territory_id')->join('territory_members', 'uid', '=', 'account_uid')->groupBy('territory_id')->get();

        foreach ($territoryMoney as $item) {
            TerritoryMoney::create([
                'territory_id' => $item->territory_id,
                'money' => $item->money,
                'time' => Carbon::now()
            ]);
        }
    }
}
