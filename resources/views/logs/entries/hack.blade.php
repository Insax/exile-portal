@php /** @var \App\Models\HackLog $log */ @endphp
@include('livewire.display-account, ['account' => $log->oldAccount]) switched accounts - new Account:
@include('livewire.display-account, ['account' => $log->newAccount])
