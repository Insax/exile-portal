@php /** @var \App\Models\LoadoutTraderLog $log */ @endphp
<a
    class="whitespace-no-wrap underline"
    href="{{ route('account.view', ['account' => $log->account_uid]) }}">
    {{ $log->account->name }}
</a>
bought a Loadout for {{ $log->price }} Poptabs
