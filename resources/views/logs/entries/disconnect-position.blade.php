@php /** @var \App\Models\DisconnectPositionLog $log */ @endphp
@include('livewire.display-account', ['$uid' => $log->account->uid, 'name' => $log->account->name])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
disconnected at {{ $log->player_pos }}
@if($log->territory_id)
    in Territory <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}
    </a>
    @if($log->build_rights)
        with build rights
    @else
        without build rights
    @endif
@endif
@if($log->player_is_alive)
    while being alive
@else
    while already being dead
@endif
