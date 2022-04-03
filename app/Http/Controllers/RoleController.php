<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function listRoles(): Factory|View|Application
    {
        return view('role.role');
    }
}
