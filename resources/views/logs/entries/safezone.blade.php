@php /** @var \App\Models\SafeZoneLog $log */ @endphp
@include('display-account', ['account' => $log->account])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
at Position {{ $log->player_pos }}
@switch($log->action)
    @case('VehicleKick')
    got kicked out of Vehicle {{ __($log->vehicle) }} owned by
    @include('display-account', ['account' => $log->ownerAccount])
    @if($log->vehicle_owner_clan_id)
        in Family <a
            class="whitespace-no-wrap underline"
            href="{{ route('clan.view', ['clan' => $log->vehicle_owner_clan_id]) }}">
            {{ $log->ownerClan->name }}
        </a> at Position {{ $log->vehicle_pos }}
    @endif
    @break
    @case('Entered')
    {{ strtolower($log->action) }} Safezone in a {{ __($log->vehicle) }} on Position {{ $log->player_pos }}
    @break
    @case('Leave')
    left Safezone in a {{ __($log->vehicle) }} on Position {{ $log->player_pos }}
    @break
@endswitch
