<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoptabsOverviewController extends Controller
{
    public function listPoptabs()
    {
        return view('poptabs.list');
    }
}
