@php /** @var \App\Models\FlagHackingLog $log */ @endphp
@include('livewire.display-account', ['$uid' => $log->account->uid, 'name' => $log->account->name])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
@switch($log->action)
    @case('COMPLETED')
    completed hacking
    @break
    @case('Cancelled')
    cancelled hacking
    @break
    @case('Failed')
    failed hacking
    @break
    @case('Interrupted')
    interrupted hacking
    @break
    @case('Started')
    started hacking
    @break
@endswitch
the Flag of Territory <a
    class="whitespace-no-wrap underline"
    href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
    {{ $log->territory->name }}
</a> at position {{ $log->player_pos }}, {{ $log->attempts }} so far
@if($log->reward_vehicle_class)
    and received a {{ __($log->reward_vehicle_class) }}
@endif
