<?php

namespace App\Http\Controllers;

use App\Models\Game\Territory;
use Spatie\Activitylog\Models\Activity;

class TerritoryController extends Controller
{
    public function listTerritories()
    {
        return view('territory.list');
    }

    public function viewTerritory(Territory $territory)
    {
        $activities = Activity::forSubject($territory)->orderBy('created_at', 'ASC')->get();
        return view('territory.view', [
            'territory' => $territory,
            'activities' => $activities
        ]);
    }
}

