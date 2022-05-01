<?php

namespace App\Http\Livewire;

use App\Models\Territory;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use JetBrains\PhpStorm\ArrayShape;
use LivewireUI\Modal\ModalComponent;

class SetTerritoryInfo extends ModalComponent
{
    public int $territoryId = 0;
    public string $reason = '';

    #[ArrayShape(['reason' => "string[]"])]
    public function rules(): array
    {
        return [
            'reason' => ['required', 'min:10']
        ];
    }

    public function mount(Territory $territory)
    {
        $this->territoryId = $territory->id;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.set-territory-info');
    }

    public function setInfo()
    {
        $territory = Territory::find($this->territoryId);
        activity()->by(Auth::user())
            ->on($territory)
            ->withProperty('action', 'INFO')
            ->log($this->reason);

        $this->closeModal();
    }
}
