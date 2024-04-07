@php /** @var \App\Models\VirtualGarageLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->account->uid, 'name' => $log->account->name])&nbsp;
@if($log->clan_id)
    in Family&nbsp; <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>&nbsp;
@endif
@switch($log->action)
    @case('Store')
    stored&nbsp;
    @break
    @case('Retrieve')
    retrieved&nbsp;
    @break
@endswitch
Vehicle {{ __($log->vehicle_class) }} at Position {{ $log->vehicle_pos }}&nbsp;
@if($log->territory_id)
    in Territory&nbsp;
    <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}
    </a>&nbsp;
@endif
with nickname {{ $log->nickname }}
