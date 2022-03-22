<?php

namespace App\Http\Controllers;

use App\Models\Game\Clan;
use App\Models\Game\Territory;
use Cache;

class ClanController extends Controller
{
    public function listClans()
    {
        return view('clan.list');
    }

    public function viewClan(Clan $clan)
    {
        $members = Cache::remember('clanId' . $clan->id . 'Accounts', 15 * 60, function () use ($clan) {
            return $clan->accounts;
        });

        $territoryIds = array();
        foreach ($members as $member) {
            $territories = Cache::remember('accountId' . $member->id . 'Territories', 15 * 60, function () use ($member) {
                return $member->territories;
            });
            foreach ($territories as $territory) {
                if ($territory)
                    $territoryIds[] = $territory->id;
            }
        }
        $territories = null;
        if (count($territoryIds)) {
            $territories = Cache::remember('whereTerritoryId' . serialize($territoryIds), 15 * 60, function () use ($territoryIds) {
                return Territory::whereIn('id', $territoryIds)->get();
            });
        }
        return view('clan.view', ['clan' => $clan, 'territories' => $territories]);
    }
}
