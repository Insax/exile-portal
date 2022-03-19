<?php

namespace App\Jobs;

use App\Models\InfistarLog;
use App\Models\ParsedInfistarLog;
use App\Models\PortalInstance;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ParseInmateMarketLogs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var string  Our subtype for this Job */
    const LOG_SUBTYPE = 'INMATE_MARKET_LOG';

    /**
     * Not Accepted Log Types
     */
    const LOGTYPE_PREINIT                            = 'PreInit';
    const LOGTYPE_INVENTORY_INITIALIZE               = 'InventoryInitalize';

    /** @var string Buy something */
    const LOGTYPE_BUY_NOW_REQUEST                   = 'BuyNowRequest';
    /** @var string Enlist item */
    const LOGTYPE_CREATE_NEW_LISTING_REQUEST        = 'createNewListingRequest';

    /** @var string[] Not needed Logs */
    const LOGS_TO_IGNORE = [
        self::LOGTYPE_PREINIT,
        self::LOGTYPE_INVENTORY_INITIALIZE
    ];

    /** @var string[] Logs which get parsed */
    const ACCEPTED_LOGS = [
        self::LOGTYPE_BUY_NOW_REQUEST               => "/([\d]+) bought player  ([\d]+)'s ([^\s]+) for ([\d]+)/",
        self::LOGTYPE_CREATE_NEW_LISTING_REQUEST    => "/\.{3} New listing Array  (.*)/"
    ];

    /** @var string Pattern to figure out the type of log */
    const TYPE_PATTERN = "/\[(.*?)\]/";

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
     * Handle the job.
     * Parses all logs of the specified subtype, checks for the logtype and then parses each one to a better structure.
     *
     * @return void
     */
    public function handle()
    {
        /** @var int $currentInstance Needed for inserting */
        $currentInstance = PortalInstance::whereName(config('portal.instanceName'))->first()->id;

        foreach (InfistarLog::whereLogname(self::LOG_SUBTYPE)->get(['logentry', 'time']) as $infiStarLog) {
            /* Match for the first bracket */
            preg_match(self::TYPE_PATTERN, $infiStarLog->logentry, $typeMatch);
            if(!in_array($typeMatch[1], self::LOGS_TO_IGNORE)) {
                switch ($typeMatch[1]) {
                    case self::LOGTYPE_BUY_NOW_REQUEST:
                        preg_match(self::ACCEPTED_LOGS[$typeMatch[1]], $infiStarLog->logentry, $logMatches);
                        ParsedInfistarLog::create([
                            'portal_instance_id' => $currentInstance,
                            'source_account_id' => $logMatches[2],
                            'receiver_account_id' => $logMatches[1],
                            'item' => $logMatches[3],
                            'price' => $logMatches[4],
                            'time' => $infiStarLog->time
                        ]);
                        break;
                    case self::LOGTYPE_CREATE_NEW_LISTING_REQUEST:
                        preg_match(self::ACCEPTED_LOGS[$typeMatch[1]], $infiStarLog->logentry, $logMatches);
                        $decodedSellerLog = json_decode($logMatches[1]);
                        ParsedInfistarLog::create([
                            'portal_instance_id' => $currentInstance,
                            'source_account_id' => $decodedSellerLog[4],
                            'receiver_account_id' => null,
                            'item' => $decodedSellerLog[2][0],
                            'price' => $decodedSellerLog[3],
                            'time' => $infiStarLog->time
                        ]);
                        break;
                }
            }
            $infiStarLog->delete();
        }
    }
}
