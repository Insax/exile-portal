<?php

namespace App\Jobs;

use App\Models\InfistarLog;
use App\Models\ParsedDailyRewardLog;
use App\Models\PortalInstance;
use Cache;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ParseDailyRewardLogs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var string  Our subtype for this Job */
    const LOG_SUBTYPE = 'DAILYREWARD_LOG';

    const REGEX = '/\((\d{17}). \| Reward {2}(.*)/';

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
        /** @var int $currentInstance Needed for inserting */
        $currentInstance = Cache::rememberForever('portalInstanceId', function () {
            return PortalInstance::whereName(config('portal.instanceName'))->first()->id;
        });

        foreach (InfistarLog::whereLogname(self::LOG_SUBTYPE)->get(['logentry', 'time']) as $infiStarLog) {
            preg_match(self::REGEX, $infiStarLog->logentry, $matches);
            if(isset($matches[2]))
                ParsedDailyRewardLog::create([
                    'portal_instance_id' => $currentInstance,
                    'account_uid' => $matches[1],
                    'reward' => strtoupper($matches[2]),
                    'time' => $infiStarLog->time
                ]);

            $infiStarLog->delete();
        }
    }
}
