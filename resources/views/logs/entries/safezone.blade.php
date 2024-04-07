@php /** @var \App\Models\SafeZoneLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->account->uid, 'name' => $log->account->name])&nbsp;
@if($log->clan_id)
    in Family&nbsp; <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>&nbsp;
@endif
at Position {{ $log->player_pos }}&nbsp;
@switch($log->action)
    @case('VehicleKick')
    got kicked out of Vehicle {{ __($log->vehicle) }} owned by&nbsp;
    @if($log->vehicle_owner_uid)
        @include('livewire.display-account', ['uid' => $log->vehicle_owner_uid, 'name' => $log->ownerAccount->name])
        @if($log->vehicle_owner_clan_id)
        in Family&nbsp; <a
            class="whitespace-no-wrap underline"
            href="{{ route('clan.view', ['clan' => $log->vehicle_owner_clan_id]) }}">
            {{ $log->ownerClan->name }}
        </a> at Position {{ $log->vehicle_pos }}&nbsp;
    @endif
    @else
        Unknown Player
    @endif

    @break
    @case('Entered')
    {{ strtolower($log->action) }} Safezone in a {{ __($log->vehicle) }} on Position {{ $log->player_pos }}
    @break
    @case('Leave')
    left Safezone in a {{ __($log->vehicle) }} on Position {{ $log->player_pos }}
    @break
@endswitch
