@php /** @var \App\Models\LoadoutTraderLog $log */ @endphp
@livewire('display-account', ['account' => $log->account])
bought a Loadout for {{ $log->price }} Poptabs
