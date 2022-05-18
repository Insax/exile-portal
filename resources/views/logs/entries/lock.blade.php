@php /** @var \App\Models\LockLog $log */ @endphp
@include('livewire.display-account, ['account' => $log->account])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
{{ strtolower($log->action) }} {{ __($log->lockable->class) }} using Code: {{ $log->pin_code }} at Position {{ $log->player_pos }}
@if($log->territory_id)
    in Territory <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}
    </a>
@endif
