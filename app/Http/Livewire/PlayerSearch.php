<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Livewire\Component;

class PlayerSearch extends Component
{
    public $search;
    public $accounts;


    protected $rules = [
        'search' => 'max:30|min:3|required'
    ];

    public function render()
    {
        return view('livewire.player-search');
    }

    public function updated($propertyName)
    {
        $validated = $this->validateOnly($propertyName);
        $this->accounts = Account::whereUid($validated['search'])->orWhere('name', 'LIKE', '%'.$validated['search'].'%')->get();
    }
}
