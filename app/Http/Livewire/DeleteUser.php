<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteUser extends ModalComponent
{
    public int $userId = 0;

    public function mount(User $user)
    {
        $this->userId = $user->id;
    }

    public function delete()
    {
        User::find($this->userId)->deactivateUser();
        $this->closeModalWithEvents([
            ManageUsers::getName() => 'userUpdated'
        ]);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.delete-user');
    }
}
