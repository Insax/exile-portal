@php /** @var \App\Models\PlayerKillLog $log */ @endphp
@livewire('display-account', ['account' => $log->killerAccount])
@if($log->victim_clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->victim_clan_id]) }}">
        {{ $log->victimClan->name }}
    </a>
@endif
from Position {{ $log->killer_pos }} killed Player
@livewire('display-account', ['account' => $log->victimAccount])
@if($log->killer_clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->killer_clan_id]) }}">
        {{ $log->killerClan->name }}
    </a>
@endif
at Position {{ $log->victim_pos }}
