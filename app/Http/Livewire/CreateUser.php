<?php

namespace App\Http\Livewire;

use App\Models\User;
use Hash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class CreateUser extends ModalComponent
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $role = '';

    protected array $rules = [
        'name' => ['required', 'string', 'max:255', 'unique:users,name'],
        'email' => [
            'required',
            'string',
            'email',
            'max:255',
            'unique:users,email'
        ],
        'password' => ['min:8', 'required', 'string']
    ];

    public function store()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        $user->assignRole($this->role);

        $this->closeModalWithEvents([
            ManageUsers::getName() => 'userUpdated'
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render(): Factory|View|Application
    {
        $this->role = Role::where('name', '!=', 'Super Admin')->first()->name;
        return view('livewire.create-user');
    }
}
