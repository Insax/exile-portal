<?php

namespace App\Console;

use App\Jobs\ParseAllContainersJob;
use App\Jobs\ParsePlayerMoneyJob;
use App\Jobs\ParseTerritoryMembersJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->job(new ParseTerritoryMembersJob(), config('portal.instanceName'))->everyFifteenMinutes();
        $schedule->job(new ParseAllContainersJob(), config('portal.instanceName'))->everyFiveMinutes();
        $schedule->job(new ParsePlayerMoneyJob(), config('portal.instanceName'))->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
