@php /** @var \App\Models\VirtualGarageLog $log */ @endphp
@include('display-account', ['account' => $log->account])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
@switch($log->action)
    @case('Store')
    stored
    @break
    @case('Retrieve')
    retrieved
    @break
@endswitch
Vehicle {{ __($log->vehicle_class) }} at Position {{ $log->vehicle_pos }}
@if($log->territory_id)
    in Territory
    <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}
    </a>
@endif
with nickname {{ $log->nickname }}
