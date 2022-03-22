<?php

namespace App\Http\Controllers;

use App\Models\PortalInstance;

class ManagePortalController extends Controller
{
    public function home()
    {
        return view('portal.home', ['instances' => PortalInstance::all()]);
    }
}
