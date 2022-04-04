<?php

namespace App\Console\Commands;

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
        LogTemplate::truncate();
        LogTemplate::create([
            'log_name' => 'ADMINLOG',
            'argument_count' => 4,
            'template' => 'At: %s Admin: <a class="whitespace-no-wrap underline" href="%s">%s</a> performed %s'
        ]);
        return 0;
    }
}
