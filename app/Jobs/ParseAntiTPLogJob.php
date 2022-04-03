<?php

namespace App\Jobs;

use App\Models\AntiTPLog;
use App\Models\InfistarLog;
use App\Models\PortalInstance;
use App\Traits\ParseModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ParseAntiTPLogJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, ParseModel;

    const LOG_NAME = 'ANTI_TP';
    const REGEX = '/(\S*)\s(\d{17})\s\|\s(\S+)\s(\d+)\s([+-]?(\d*\.)?\d+)\s(\[\S+])\s(\[\S+])\s(\d+)\/(\d+)\s(\d)/';

    private array $matches = array();

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
        return AntiTPLog::class;
    }
}
