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
        $terr = Territory::withTrashed()->find($territory);
        if($terr) {            
            $activities = Activity::forSubject($terr)->orderBy('created_at', 'ASC')->get();
            return view('territory.view', [
                'territory' => $terr,
                'activities' => $activities
            ]);
        }
        abort(404);
    }
}

