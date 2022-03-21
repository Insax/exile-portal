<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Cache;
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
        $this->accounts = Cache::remember('accountsWhereUidOrName'.$this->search, 30*60, function() use ($propertyName) {
            $validated = $this->validateOnly($propertyName);
            return Account::whereUid($validated['search'])->orWhere('name', 'LIKE', '%'.$validated['search'].'%')->get();
        });
    }
}
