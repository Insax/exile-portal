<?php

namespace App\Http\Livewire;

use App\Models\Clan;
use App\Models\GameServerClan;
use App\Models\GameServerTerritory;
use App\Models\Territory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class RenameClan extends ModalComponent
{
    public int $clanId = 0;
    public string $name = '';

    public function mount(Clan $clan)
    {
        $this->clanId = $clan->id;
        $this->name = $clan->name;
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

        $clan = GameServerClan::find($this->clanId);
        $localClan = Clan::find($this->clanId);
        $localClan->name = $this->name;
        $clan->name = $this->name;
        $localClan->save();
        $clan->save();
        $this->closeModal();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.rename-clan');
    }
}
