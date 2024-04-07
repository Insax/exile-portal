@php /** @var \App\Models\PartyLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->account->uid, 'name' => $log->account->name])&nbsp;
@if($log->clan_id)
    in Family&nbsp; <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}&nbsp;
    </a>
@endif
@switch($log->action)
    @case('Invite')
    invited Player @include('livewire.display-account', ['uid' => $log->invited_account_uid, 'name' => $log->inviteeAccount->name])&nbsp;
    @if($log->invited_player_clan_id)
        in Family&nbsp; <a
            class="whitespace-no-wrap underline"
            href="{{ route('clan.view', ['clan' => $log->invited_player_clan_id]) }}">
            {{ $log->inviteeClan->name }}&nbsp;
        </a>
    @endif to party {{ $log->group_name }}&nbsp;
    @break
@endswitch
