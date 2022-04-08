<?php

namespace App\Jobs;

use App\Models\AdminLog;
use App\Models\InfistarLog;
use App\Models\PortalInstance;
use App\Traits\ParseModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ParseAdminLogJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, ParseModel;

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

        $this->parse();
    }

    /**
     * @return string
     */
    public function getLoggerClass(): string
    {
        return AdminLog::class;
    }
}
