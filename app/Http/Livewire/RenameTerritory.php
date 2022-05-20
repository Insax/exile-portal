<?php

namespace App\Http\Livewire;

use App\Models\GameServerTerritory;
use App\Models\Territory;
use LivewireUI\Modal\ModalComponent;

class RenameTerritory extends ModalComponent
{
    public int $territoryId = 0;
    public string $name = '';

    public function mount(Territory $territory)
    {
        $this->territoryId = $territory->id;
        $this->name = $territory->name;
    }

    public function rules(): array
    {
        return [
            'name' => ['min:1', 'max:64', 'required']
        ];
    }

    public function rename()
    {
        $this->validate();

        $territory = GameServerTerritory::find($this->territoryId);
        $localTerritory = Territory::find($this->territoryId);
        $localTerritory->name = $this->name;
        $territory->name = $this->name;
        $localTerritory->save();
        $territory->save();
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.rename-territory');
    }
}
