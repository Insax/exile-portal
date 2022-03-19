<?php

namespace App\Http\Livewire;

use App\Models\PortalInstance;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CreatePortalInstance extends Component
{
    public Collection $portalInstances;
    public $name;
    public $url;

    protected $rules = [
        'name' => 'required|unique:portal_instances,name',
        'url' => 'required|unique:portal_instances,url',
    ];

    public function render()
    {
        $this->portalInstances = PortalInstance::all();
        return view('livewire.create-portal-instance');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $data = $this->validate();

        PortalInstance::create($data);
    }
}
