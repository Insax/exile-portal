<?php

namespace App\Http\Controllers;

use App\Jobs\RefreshAllTerritoryInformation;
use App\Models\Account;
use App\Models\Territory;
use Cache;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function viewAccount(Account $account): Factory|View|Application
    {
        //$this->dispatch(new RefreshAllTerritoryInformation());

        $territories = Cache::remember('territoresWhereMembersAccountId'.$account->uid, 15, function () {
            Territory::whereRelation('members', 'uid', $account->uid)->get();
        });

        return view('account.view', ['account' => $account, 'territories' => $territories]);
    }
}
