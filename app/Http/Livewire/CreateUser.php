<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateUser extends ModalComponent
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $role = 'Moderator';

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
            'password' => \Hash::make($this->password)
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
        return view('livewire.create-user');
    }
}
