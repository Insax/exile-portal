<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Territory;
use Cache;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AccountController extends Controller
{
    public function viewAccount(Account $account): Factory|View|Application
    {
        $account->load('territories');
        $territories = $account->territories;


        return view('account.view', ['account' => $account, 'territories' => $territories]);
    }
}
