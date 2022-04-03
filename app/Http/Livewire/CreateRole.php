<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRole extends ModalComponent
{
    public Collection $permissions;
    public string $name = '';
    public array $selectedPermissions = array();

    protected array $rules = [
        'name' => ['required', 'string', 'max:255', 'unique:roles,name']
    ];

    public function store()
    {
        $this->validate();

        $role = Role::create([
            'name' => $this->name
        ]);

        foreach ($this->selectedPermissions as $id => $selected) {
            if($selected)
                $role->givePermissionTo(Permission::findById($id));
        }

        $this->closeModalWithEvents([
            ManageRoles::getName() => 'roleUpdated'
        ]);
    }

    public function render(): Factory|View|Application
    {
        $this->permissions = Permission::all();
        return view('livewire.create-role');
    }
}
