<?php

namespace App\Http\Controllers;

use App\Models\Territory;
use Spatie\Activitylog\Models\Activity;
use Carbon\Carbon;

class TerritoryController extends Controller
{
    public function listTerritories()
    {
        return view('territory.list');
    }

    public function viewTerritory($territory)
    {
        $terr = Territory::withTrashed()->whereId($territory)->limit(1);
        if($terr) {
            if($terr->deleted_at <= Carbon::now()->subDays(14))
                abort(404);
            
            $activities = Activity::forSubject($territory)->orderBy('created_at', 'ASC')->get();
            return view('territory.view', [
                'territory' => $terr,
                'activities' => $activities
            ]);
        }
        abort(404);
    }
}

