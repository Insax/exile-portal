@php /** @var \App\Models\LoadoutTraderLog $log */ @endphp
@include('display-account', ['account' => $log->account])
bought a Loadout for {{ $log->price }} Poptabs
