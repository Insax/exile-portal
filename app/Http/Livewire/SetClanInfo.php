<?php

namespace App\Http\Livewire;

use App\Models\Clan;
use Auth;
use JetBrains\PhpStorm\ArrayShape;
use LivewireUI\Modal\ModalComponent;

class SetClanInfo extends ModalComponent
{
    public int $clanId = 0;
    public string $reason = '';

    #[ArrayShape(['reason' => "string[]"])]
    public function rules(): array
    {
        return [
            'reason' => ['required', 'min:10']
        ];
    }

    public function mount(Clan $clan)
    {
        $this->clanId = $clan->id;
    }

    public function render()
    {
        return view('livewire.set-clan-info');
    }

    public function setInfo()
    {
        $clan = Clan::find($this->clanId);
        activity()->by(Auth::user())
            ->on($clan)
            ->withProperty('action', 'INFO')
            ->log($this->reason);

        $this->closeModal();
    }
}
