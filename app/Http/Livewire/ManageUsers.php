<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ManageUsers extends Component
{
    public $users;
    public $name = '';

    protected $listeners = ['userUpdated' => '$refresh'];

    public function render(): Factory|View|Application
    {
        $this->users = User::where('name', 'LIKE', '%' . $this->name . '%')->get();
        return view('livewire.manage-users');
    }

}
