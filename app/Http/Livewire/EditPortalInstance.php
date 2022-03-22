<?php

namespace App\Http\Livewire;

use App\Models\PortalInstance;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\ArrayShape;
use LivewireUI\Modal\ModalComponent;

class EditPortalInstance extends ModalComponent
{
    public int $portalId;
    public string $name;
    public string $url;
    public string $active;


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
            'name' => ['required', Rule::unique('portal_instances')->ignore($this->portalId)],
            'url' => ['required', Rule::unique('portal_instances')->ignore($this->portalId)],
        ];
    }

    public function update()
    {
        $this->validate();

        PortalInstance::find($this->portalId)->update([
            'name' => $this->name,
            'url' => $this->url,
            'active' => $this->active == 'checked'
        ]);

        $this->closeModalWithEvents([
            ManagePortalInstances::getName() => 'instanceChanged'
        ]);
    }

    public function mount(PortalInstance $instance)
    {
        $this->portalId = $instance->id;
        $this->name = $instance->name;
        $this->url = $instance->url;
        $this->active = $instance->active ? 'checked' : '';
    }

    public function render()
    {
        return view('livewire.edit-portal-instance');
    }
}
