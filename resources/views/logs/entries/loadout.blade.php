@php /** @var \App\Models\LoadoutTraderLog $log */ @endphp
@include('livewire.display-account', ['$uid' => $log->account->uid, 'name' => $log->account->name])
bought a Loadout for {{ $log->price }} Poptabs
