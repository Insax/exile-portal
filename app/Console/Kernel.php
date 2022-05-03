<?php

namespace App\Console;

use App\Jobs\AccountMoneyTracker;
use App\Jobs\AccountRespectTracker;
use App\Jobs\ConstructionCountTracker;
use App\Jobs\ParseAllContainersJob;
use App\Jobs\PlayerOnlineTimeTrackerJob;
use App\Jobs\SoftDeleteGameData;
use App\Jobs\SyncDatabaseData;
use App\Jobs\SyncLogData;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->job(new SyncDatabaseData)->then(function () {
            ParseAllContainersJob::dispatch();
            SyncLogData::dispatch();
            PlayerOnlineTimeTrackerJob::dispatch();
            AccountMoneyTracker::dispatch();
            AccountRespectTracker::dispatch();
            ConstructionCountTracker::dispatch();
        })->everyMinute();

        $schedule->job(SoftDeleteGameData::class)->everyThirtyMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
