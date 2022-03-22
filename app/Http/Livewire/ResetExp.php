<?php

namespace App\Http\Livewire;

use App\Models\Game\Account;
use LivewireUI\Modal\ModalComponent;

class ResetExp extends ModalComponent
{
    public string $accountUID;
    public int $accountLevel;

    public function mount(Account $account)
    {
        $this->accountUID = $account->uid;
        $this->accountLevel = $account->exp_level;
    }

    public function resetEXP()
    {
        Account::find($this->accountUID)->update([
            'exp_perkPoints' => $this->accountLevel * 2,
            'exp_perks' => null
        ]);

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.reset-exp');
    }
}
