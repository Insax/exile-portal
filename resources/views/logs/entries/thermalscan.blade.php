@php /** @var \App\Models\ThermalScannerLog $log */ @endphp
@include('livewire.display-account, ['account' => $log->account])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
scanned {{ __($log->scanable->class) }} which has Code: {{ $log->pin_code }} at Position {{ $log->player_pos }}
@if($log->territory_id)
    in Territory <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}
    </a> and {{ $this->has_rights ? 'and has Building rights' : 'and does not have Bulding rights' }}
@endif
