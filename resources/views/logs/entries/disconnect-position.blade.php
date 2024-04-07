@php /** @var \App\Models\DisconnectPositionLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->account->uid, 'name' => $log->account->name])&nbsp;
@if($log->clan_id)
    in Family&nbsp; <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>&nbsp;
@endif
disconnected at {{ $log->player_pos }}&nbsp;
@if($log->territory_id)
    in Territory &nbsp;<a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}
    </a>&nbsp;
    @if($log->build_rights)
        with build rights &nbsp;
    @else
        without build rights &nbsp;
    @endif
@endif
@if($log->player_is_alive)
    while being alive &nbsp;
@else
    while already being dead &nbsp;
@endif
