@php /** @var \App\Models\HackLog $log */ @endphp
@livewire('display-account', ['account' => $log->oldAccount]) switched accounts - new Account:
@livewire('display-account', ['account' => $log->newAccount])
