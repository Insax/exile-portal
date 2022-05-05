@php /** @var \App\Models\PlayerKillLog $log */ @endphp
<a
    class="whitespace-no-wrap underline"
    href="{{ route('account.view', ['account' => $log->killer_account_uid]) }}">
    {{ $log->killerAccount->name }}
</a>
@if($log->killer_clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->killer_clan_id]) }}">
        {{ $log->killerClan->name }}
    </a>
@endif
from Position {{ $log->killer_pos }} killed Player
<a
    class="whitespace-no-wrap underline"
    href="{{ route('account.view', ['account' => $log->victim_account_uid]) }}">
    {{ $log->victimAccount->name }}
</a>
@if($log->victim_clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->victim_clan_id]) }}">
        {{ $log->victimClan->name }}
    </a>
@endif
at Position {{ $log->victim_pos }}
