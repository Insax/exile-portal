<?php

namespace App\Http\Livewire;

use App\Models\PortalInstance;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeletePortalInstance extends ModalComponent
{
    public int $instanceId;

    public function mount(PortalInstance $instance)
    {
        $this->instanceId = $instance->id;
    }

    public function delete()
    {
        PortalInstance::find($this->instanceId)->delete();
        $this->closeModalWithEvents([
            ManagePortalInstances::getName(), 'instanceChanged'
        ]);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.delete-portal-instance');
    }
}
