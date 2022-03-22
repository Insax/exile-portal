<?php

namespace App\Http\Controllers;

class PoptabsOverviewController extends Controller
{
    public function listPoptabs()
    {
        return view('poptabs.list');
    }
}
