<?php

namespace App\Http\Livewire;

use App\Models\PortalInstance;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class InstanceSelectorDropdown extends Component
{
    public Collection $instances;
    public PortalInstance $own;

    public function render(): Factory|View|Application
    {
        $this->instances = PortalInstance::all();
        foreach ($this->instances as $instance) {
            if(config('portal.instanceName') === $instance->name)
                $this->own = $instance;
        }

        return view('livewire.instance-selector-dropdown');
    }
}
