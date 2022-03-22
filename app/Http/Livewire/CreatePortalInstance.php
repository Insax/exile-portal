<?php

namespace App\Http\Livewire;

use App\Models\PortalInstance;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\ArrayShape;
use LivewireUI\Modal\ModalComponent;

class CreatePortalInstance extends ModalComponent
{
    public string $name = '';
    public string $url = '';
    public string $active = 'checked';


    /**
     * @param $propertyName
     * @return void
     * @throws ValidationException
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    #[ArrayShape(['name' => "array", 'url' => "array"])]
    public function rules(): array
    {
        return [
            'name' => ['required', Rule::unique('portal_instances')],
            'url' => ['required', Rule::unique('portal_instances')],
        ];
    }

    public function store()
    {
        $this->validate();

        PortalInstance::create([
            'name' => $this->name,
            'url' => $this->url,
            'active' => $this->active == 'checked'
        ]);

        $this->closeModalWithEvents([
            ManagePortalInstances::getName() => 'instanceChanged'
        ]);
    }

    public function render()
    {
        return view('livewire.create-portal-instance');
    }
}
