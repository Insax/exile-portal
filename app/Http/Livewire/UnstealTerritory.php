<?php

namespace App\Http\Livewire;

use App\Models\Game\Territory;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;

class UnstealTerritory extends ModalComponent
{
    public int $territoryId;

    public function mount(Territory $territory)
    {
        $this->territoryId = $territory->id;
    }

    public function restore()
    {
        $territory = Territory::find($this->territoryId);
        $territory->flag_stolen = 0;
        $territory->flag_stolen_at = null;
        $territory->flag_stolen_by_uid = null;
        $territory->last_paid_at = Carbon::now();

        $this->closeModalWithEvents([
            ListTerritories::getName() => 'restored'
        ]);
    }

    public function render()
    {
        return view('livewire.unsteal-territory');
    }
}
