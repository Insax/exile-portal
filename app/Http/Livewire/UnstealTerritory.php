<?php

namespace App\Http\Livewire;

use App\Models\GameServerTerritory;
use App\Models\Territory;
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
        $territory = GameServerTerritory::find($this->territoryId);
        $territory->flag_stolen = 0;
        $territory->flag_stolen_at = null;
        $territory->flag_stolen_by_uid = null;
        $territory->last_paid_at = Carbon::now();
        $territory->save();

        $localTerritory = Territory::find($this->territoryId);
        $localTerritory->flag_stolen = 0;
        $localTerritory->flag_stolen_at = null;
        $localTerritory->flag_stolen_by_uid = null;
        $localTerritory->last_paid_at = Carbon::now();
        $localTerritory->save();

        $this->closeModalWithEvents([
            ListTerritories::getName() => 'restored'
        ]);
    }

    public function render()
    {
        return view('livewire.unsteal-territory');
    }
}
