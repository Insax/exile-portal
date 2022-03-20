<?php

namespace App\Http\Livewire;

use App\Models\PortalInstance;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ManagePortalInstances extends Component
{
    /** @var Collection All Portal Instances */
    public Collection $portalInstances;

    protected $listeners = [
        'instanceChanged' => '$refresh'
    ];

    public function render(): Factory|View|Application
    {
        $this->portalInstances = PortalInstance::all();
        return view('livewire.manage-portal-instances');
    }
}
