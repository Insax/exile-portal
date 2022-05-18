@php /** @var \App\Models\HotwireLog $log */ @endphp
@include('livewire.display-account, ['account' => $log->account])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
hotwired a {{ __($log->vehicle_class) }}
@if($log->territory_id)
    in Territory <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}
    </a>
@endif
, Player Position {{ $log->player_pos }}
