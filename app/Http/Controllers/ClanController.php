<?php

namespace App\Http\Controllers;

use App\Models\Clan;
use App\Models\PortalInstance;
use App\Models\Territory;
use Cache;
use Illuminate\Http\Request;

class ClanController extends Controller
{
    public function listClans()
    {
        return view('clan.list');
    }

    public function viewClan(Clan $clan)
    {
        $members = Cache::remember('clanId'.$clan->id.'Accounts', 15, function () use ($clan) {
            return $clan->accounts;
        });

        $territoryIds = array();
        foreach ($members as $member) {
            $territories = Cache::remember('accountId'.$member->id.'Territories', 15, function () use ($member) {
                return $member->territories;
            });
            foreach ($territories as $territory) {
                if($territory)
                    $territoryIds[] = $territory->id;
            }
        }
        $territories = null;
        if(count($territoryIds)) {
            $territories = Cache::remember('whereTerritoryId'.serialize($territoryIds), 15, function () use ($territoryIds) {
                Territory::whereIn('id', $territoryIds)->get();
            });
        }
        return view('clan.view', ['clan' => $clan, 'territories' => $territories]);
    }
}
