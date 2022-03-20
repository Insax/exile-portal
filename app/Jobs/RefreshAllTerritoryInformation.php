<?php

namespace App\Jobs;

use App\Models\PortalInstance;
use App\Models\Territory;
use App\Models\TerritoryMember;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RefreshAllTerritoryInformation implements ShouldQueue
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
        TerritoryMember::truncate();
        $territories = Territory::get();

        foreach ($territories as $territory) {
            $moderators = json_decode($territory->moderators);
            $builders = json_decode($territory->build_rights);
            $builders[] = $territory->owner_uid;
            $members = array_unique(array_merge($moderators, $builders));

            foreach ($members as $member)
            if($member) {
                TerritoryMember::create([
                    'territory_id' => $territory->id,
                    'account_uid' => $member
                ]);
            }
        }
    }
}
