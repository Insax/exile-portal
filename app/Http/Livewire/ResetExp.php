<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\GameServerAccount;
use Carbon\Carbon;
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
        GameServerAccount::find($this->accountUID)->update([
            'exp_perkPoints' => $this->accountLevel * 2,
            'exp_perks' => null,
            'last_updated_at' => Carbon::now()
        ]);

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.reset-exp');
    }
}
