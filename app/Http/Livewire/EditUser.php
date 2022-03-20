<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditUser extends ModalComponent
{
    //public User $user;
    public int $userId;
    public string $name;
    public string $email;
    public string $role;

    protected $rules = [
        'name' => 'required|unique:users,name',
        'email' => 'required|unique:users,email'
    ];

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
        $this->role = $user->getRoleNames()->first() ?? 'Moderator';
    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
