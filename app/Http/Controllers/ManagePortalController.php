<?php

namespace App\Http\Controllers;

use App\Models\PortalInstance;
use Illuminate\Http\Request;

class ManagePortalController extends Controller
{
    public function home() {
        return view('portal.home', ['instances' => PortalInstance::all()]);
    }
}
