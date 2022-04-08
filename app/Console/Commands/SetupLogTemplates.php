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
            'template' => 'At %s Admin: <a class="whitespace-no-wrap underline" href="%s">%s</a> performed %s'
        ]);
        LogTemplate::create([
            'log_name' => 'ANTI_TP_LOG',
            'argument_count' => 12,
            'template' => 'At %s <a class="whitespace-no-wrap underline" href="%s">%s</a> teleported %d within %f, from %s to %s at a speed of %d/%d Count: [%d]'
        ]);
        LogTemplate::create([
            'log_name' => 'BANLOG',
            'argument_count' => 5,
            'template' => 'At %s <a class="whitespace-no-wrap underline" href="%s">%s</a> got banned for: %s - Successful [%s]'
        ]);
        LogTemplate::create([
            'log_name' => 'BREACHING_LOG',
            'argument_count' => 9,
            'template' => 'At %s <a class="whitespace-no-wrap underline" href="%s">%s</a> from Family <a class="whitespace-no-wrap underline" href="%s">%s</a> %s planting a %s on Territory <a class="whitespace-no-wrap underline" href="%s">%s</a> on Object %s at Position %s'
        ]);
        LogTemplate::create([
            'log_name' => 'BREACHING_LOG',
            'argument_count' => 8,
            'template' => 'At %s <a class="whitespace-no-wrap underline" href="%s">%s</a> %s planting a %s on Territory <a class="whitespace-no-wrap underline" href="%s">%s</a> on Object %s at Position %s'
        ]);
        return 0;
    }
}
