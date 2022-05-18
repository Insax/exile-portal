@php /** @var \App\Models\VehicleDestroyedLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->account->uid, 'name' => $log->account->name])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
destroyed Vehicle {{ $log->vehicle_class }} ({{ $log->vehicle_pos }}) from Position {{ $log->player_pos }}
