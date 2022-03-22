<?php

namespace App\Console\Commands;

use App\Jobs\ParseAllContainersJob;
use App\Jobs\ParseTerritoryMembersJob;
use Illuminate\Console\Command;

class SetupParses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bla';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        dispatch(new ParseAllContainersJob())->onQueue(config('portal.instanceName'));
        dispatch(new ParseTerritoryMembersJob())->onQueue(config('portal.instanceName'));
        return 0;
    }
}
