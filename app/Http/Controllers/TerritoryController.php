<?php

namespace App\Http\Controllers;

use App\Jobs\ParseAllContainersJob;
use App\Jobs\RefreshAllTerritoryInformation;
use App\Models\Container;
use App\Models\Territory;
use Spatie\Activitylog\Models\Activity;

class TerritoryController extends Controller
{
    public function listTerritories()
    {
        return view('territory.list');
    }

    public function viewTerritory(Territory $territory) {
        $activities = Activity::forSubject($territory)->get();
        return view('territory.view', [
            'territory' => $territory,
            'activities' => $activities
        ]);
    }
}

