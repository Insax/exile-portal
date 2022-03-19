<?php

namespace App\Http\Controllers;

use App\Jobs\RefreshAllTerritoryInformation;
use App\Models\Account;
use App\Models\Territory;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function viewAccount(Account $account) {
        //$this->dispatch(new RefreshAllTerritoryInformation());

        $territories = Territory::whereRelation('members', 'uid', $account->uid)->get();

        return view('account.view', ['account' => $account, 'territories' => $territories]);
    }
}
