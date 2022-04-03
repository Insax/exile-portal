<?php

namespace App\Console\Commands;

use App\Models\PortalInstance;
use Illuminate\Console\Command;

class SetupInstance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:instance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup portal instance';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        PortalInstance::create([
           'name' => config('portal.instanceName'),
           'url' => config('app.url').'/'
        ]);

        return 0;
    }
}
