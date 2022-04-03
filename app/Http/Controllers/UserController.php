<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function manageUsers(): Application|Factory|View|RedirectResponse
    {
        if(Role::get()->count() < 2)
            return redirect()->route('roles.list');

        return view('users.manage');
    }
}
