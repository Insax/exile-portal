<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DisplayAccount extends Component
{
    public Account $account;
    public function mount(Account $account)
    {
        $this->account = $account;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.display-account', ['account' => $this->account]);
    }
}
