<?php

namespace App\Console\Commands;

use App\Models\InfistarLog;
use App\Models\LogTemplate;
use Illuminate\Console\Command;

class SetupLogTemplates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:templates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Log Templates';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (InfistarLog::select('logname')->distinct()->get() as $item) {
            $this->call('make:view', ['name' => 'logs.entries.'.strtolower($item->logname)]);
        }
        return 0;
    }
}
