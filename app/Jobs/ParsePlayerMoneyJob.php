<?php

namespace App\Jobs;

use App\Models\Account;
use App\Models\PlayerMoney;
use App\Models\PortalInstance;
use Cache;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ParsePlayerMoneyJob implements ShouldQueue
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
        $currentInstance =  PortalInstance::getCurrentPortalInstance()->id;

        foreach (Account::withSum('containers', 'money')->get() as $account) {
            PlayerMoney::create([
                'portal_instance_id' => $currentInstance,
                'account_uid' => $account->id,
                'locker_money' => $account->locker,
                'marxet_money' => $account->marxet_locker,
                'container_money' => $account->containers_sum_money
            ]);
        }
    }
}
