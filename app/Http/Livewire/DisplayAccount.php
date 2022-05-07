<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DisplayAccount extends Component
{
    public string $accountUid = '';
    public function mount(Account $account)
    {
        $this->accountUid = $account->uid;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.display-account', ['account' => Account::find($this->accountUid)]);
    }
}
