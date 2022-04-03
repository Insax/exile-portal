<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class EditUser extends ModalComponent
{
    //public User $user;
    public int $userId;
    public string $name;
    public string $email;
    public string $role;

    #[ArrayShape(['name' => "array", 'email' => "array"])]
    public function rules(): array
    {
        return [
            'name' => ['required', Rule::unique('users')->ignore($this->userId)],
            'email' => ['required', Rule::unique('users')->ignore($this->userId)],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $user = User::find($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email
        ]);

        $user->roles()->detach();
        $user->assignRole($this->role);
        $this->closeModalWithEvents([
            ManageUsers::getName() => 'userUpdated'
        ]);
    }

    public function mount(User $user)
    {
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->getRoleNames()->first() ?? Role::where('name', '!=', 'Super Admin')->first()->name;
    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
