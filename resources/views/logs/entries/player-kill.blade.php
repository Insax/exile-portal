@php /** @var \App\Models\PlayerKillLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->killer_account_uid, 'name' => $log->killerAccount->name])&nbsp;
@if($log->victim_clan_id)
    in Family&nbsp; <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->victim_clan_id]) }}">
        {{ $log->victimClan->name }}&nbsp;
    </a>
@endif
from Position {{ $log->killer_pos }} killed Player&nbsp;
@include('livewire.display-account', ['uid' => $log->victim_account_uid, 'name' => $log->victimAccount->name])&nbsp;
@if($log->killer_clan_id)
    in Family&nbsp; <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->killer_clan_id]) }}">
        {{ $log->killerClan->name }}
    </a>&nbsp;
@endif
at Position {{ $log->victim_pos }}
