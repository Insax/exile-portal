<?php

namespace App\Http\Controllers;

use App\Models\Clan;
use App\Models\Territory;
use Cache;
use Spatie\Activitylog\Models\Activity;

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
            $territories = $member->territories;

            foreach ($territories as $territory) {
                if ($territory)
                    $territoryIds[] = $territory->id;
            }

        }

        $territories = null;

        if (count($territoryIds))
            $territories = Territory::whereIn('id', $territoryIds)->get();

        $activities = Activity::forSubject($clan)->orderBy('created_at', 'ASC')->get();

        return view('clan.view', ['clan' => $clan, 'territories' => $territories, 'activities' => $activities]);
    }
}
