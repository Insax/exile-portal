<?php

namespace App\Http\Livewire;

use App\Models\GameServerTerritory;
use App\Models\Territory;
use Auth;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;

class DeleteOrRestoreTerritory extends ModalComponent
{
    public int $territoryId;
    public int $advancePayment = 8;
    public string $reason = '';
    public bool $needsPayment = false;

    public function rules(): array
    {
        if ($this->needsPayment)
            return [
                'reason' => ['required', 'min:8'],
                'advancePayment' => ['required', 'number', 'gt:0']
            ];
        return [
            'reason' => ['required']
        ];
    }

    public function mount(Territory $territory)
    {
        $this->territoryId = $territory->id;
        if ($territory->deleted_at) {
            $this->needsPayment = true;
        }
    }

    public function deleteOrRestore()
    {
        $territory = GameServerTerritory::find($this->territoryId);
        $localTerritory = Territory::find($this->territoryId);
        if ($territory->deleted_at) {
            $territory->deleted_at = null;
            if ($this->advancePayment)
                $territory->last_paid_at = Carbon::now()->subDays(8)->addDays($this->advancePayment);

            activity()->by(Auth::user())
                ->on($territory)
                ->withProperties([
                    'action' => 'restored',
                    'advance' => $this->advancePayment
                ])
                ->log($this->reason);
        } else {
            $territory->deleted_at = Carbon::now();
            activity()->by(Auth::user())
                ->on($localTerritory)
                ->withProperty('action', 'deleted')
                ->log($this->reason);
        }

        $territory->save();

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.delete-or-restore-territory');
    }
}
