<?php

namespace App\Jobs;

use App\Models\BreachingLog;
use App\Models\InfistarLog;
use App\Models\PortalInstance;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ParseChatLogJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    const LOG_NAME = 'CHAT';
    const REGEX='/(\d{17})\s(\d{17})\s(.*)/';

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
        $portalInstance = PortalInstance::getCurrentPortalInstance();
        if($portalInstance == null)
            return;

        $log = new InfistarLog();
        $log->attachLogParser(ChatLog::class);
        $log->parseLog();
    }
}
