@php /** @var \App\Models\HackLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->old_account_uid, 'name' => $log->oldAccount->name]) switched accounts - new Account:
@include('livewire.display-account', ['uid' => $log->new_account_uid, 'name' => $log->newAccount->name])
