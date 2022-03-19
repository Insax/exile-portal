<?php

namespace App\Http\Controllers;

use App\Models\Clan;
use App\Models\Territory;
use Illuminate\Http\Request;

class ClanController extends Controller
{
    public function listClans()
    {
        return view('clan.list');
    }

    public function viewClan(Clan $clan)
    {
        $members = $clan->accounts;
        $territoryIds = array();
        foreach ($members as $member) {
            foreach ($member->territories as $territory) {
                if($territory)
                    $territoryIds[] = $territory->id;
            }
        }
        $territories = null;
        if(count($territoryIds)) {
            $territories = Territory::whereIn('id', $territoryIds)->get();
        }
        return view('clan.view', ['clan' => $clan, 'territories' => $territories]);
    }
}
