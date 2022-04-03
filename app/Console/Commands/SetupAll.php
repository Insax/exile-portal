<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup everything';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('setup:instance');
        $this->call('setup:roles');
        $this->call('setup:parse');
        return 0;
    }
}
