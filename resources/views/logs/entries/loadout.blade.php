@php /** @var \App\Models\LoadoutTraderLog $log */ @endphp
@include('livewire.display-account, ['account' => $log->account])
bought a Loadout for {{ $log->price }} Poptabs
