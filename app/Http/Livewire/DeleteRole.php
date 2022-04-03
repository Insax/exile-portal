<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class DeleteRole extends ModalComponent
{
    public int $roleId;
    public string $roleName;

    public function mount(Role $role)
    {
        $this->roleId = $role->id;
        $this->roleName = $role->name;
    }

    public function delete()
    {
        Role::whereId($this->roleId)->delete();

        $this->closeModalWithEvents([
            ManageRoles::getName() => 'roleUpdated'
        ]);
    }

    public function render()
    {
        return view('livewire.delete-role');
    }
}
