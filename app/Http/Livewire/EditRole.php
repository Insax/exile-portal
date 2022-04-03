<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditRole extends ModalComponent
{
    public Collection $permissions;
    public int $roleId;
    public string $name = '';
    public array $selectedPermissions = array();

    #[ArrayShape(['name' => "array"])]
    public function rules(): array
    {
        return [
            'name' => ['required', Rule::unique('users')->ignore($this->roleId)]
        ];
    }

    public function update()
    {
        Role::whereId($this->roleId)->update([
            'name' => $this->name
        ]);

        $perms = array();

        foreach ($this->selectedPermissions as $id => $selected)
        {
            if($selected)
                $perms[] = $id;
        }

        $role = Role::findById($this->roleId);

        $role->syncPermissions(Permission::whereIn('id', $perms)->get());
        $this->closeModalWithEvents([
            ManageRoles::getName() => 'roleUpdated'
        ]);
    }


    public function mount(Role $role)
    {
        $this->roleId = $role->id;
        $this->name = $role->name;
        foreach ($role->permissions as $permission)
        {
            $this->selectedPermissions[$permission->id] = true;
        }
    }

    public function render()
    {
        $this->permissions = Permission::all();
        return view('livewire.edit-role');
    }
}
