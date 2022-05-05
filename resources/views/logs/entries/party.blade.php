@php /** @var \App\Models\PartyLog $log */ @endphp
<a
    class="whitespace-no-wrap underline"
    href="{{ route('account.view', ['account' => $log->account_uid]) }}">
    {{ $log->account->name }}
</a>
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
@switch($log->action)
    @case('Invite')
    invited Player <a
        class="whitespace-no-wrap underline"
        href="{{ route('account.view', ['account' => $log->invited_account_uid]) }}">
        {{ $log->inviteeAccount->name }}
    </a>
    @if($log->clan_id)
        in Family <a
            class="whitespace-no-wrap underline"
            href="{{ route('clan.view', ['clan' => $log->invited_player_clan_id]) }}">
            {{ $log->inviteeClan->name }}
        </a>
    @endif to party {{ $log->group_name }}
    @break
@endswitch
