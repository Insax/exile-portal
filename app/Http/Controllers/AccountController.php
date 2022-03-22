<?php

namespace App\Http\Controllers;

use App\Models\Game\Account;
use App\Models\Game\Territory;
use Cache;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AccountController extends Controller
{
    public function viewAccount(Account $account): Factory|View|Application
    {
        //$this->dispatch(new RefreshAllTerritoryInformation());

        $territories = Cache::remember('territoresWhereMembersAccountId' . $account->uid, 15 * 60, function () use ($account) {
            return Territory::whereRelation('members', 'uid', $account->uid)->get();
        });

        return view('account.view', ['account' => $account, 'territories' => $territories]);
    }
}
