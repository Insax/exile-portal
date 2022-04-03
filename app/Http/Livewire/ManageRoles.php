<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ManageRoles extends Component
{
    public Collection $roles;

    protected $listeners = ['roleUpdated' => '$refresh'];

    public function render(): Factory|View|Application
    {
        $this->roles = Role::all();
        return view('livewire.manage-roles');
    }

}
