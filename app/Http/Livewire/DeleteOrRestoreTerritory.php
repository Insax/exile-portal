<?php

namespace App\Http\Livewire;

use App\Models\Territory;
use Carbon\Carbon;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteOrRestoreTerritory extends ModalComponent
{
    public int $territoryId;

    public function mount(Territory $territory)
    {
        $this->territoryId = $territory->id;
    }

    public function deleteOrRestore()
    {
        $territory = Territory::find($this->territoryId);
        if($territory->deleted_at) {
            $territory->deleted_at = null;
            $territory->last_paid_at = Carbon::now();
        } else {
            $territory->deleted_at = Carbon::now();
        }

        $territory->save();

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.delete-or-restore-territory');
    }
}
