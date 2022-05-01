<?php

namespace App\Console\Commands;

use App\Jobs\ParseAllContainersJob;
use App\Jobs\ParseClanModerators;
use App\Jobs\ParseTerritoryBuilders;
use App\Jobs\ParseTerritoryMembers;
use App\Jobs\ParseTerritoryModerators;
use App\Jobs\SyncDatabaseData;
use Illuminate\Console\Command;

class SetupDBSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync GameDB with Portal DB';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        SyncDatabaseData::withChain([
            new ParseAllContainersJob()
        ])->dispatch();
        return 0;
    }
}
