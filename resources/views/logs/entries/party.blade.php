@php /** @var \App\Models\PartyLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->account->uid, 'name' => $log->account->name])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
@switch($log->action)
    @case('Invite')
    invited Player @include('livewire.display-account', ['uid' => $log->invited_account_uid, 'name' => $log->inviteeAccount->name])
    @if($log->invited_player_clan_id)
        in Family <a
            class="whitespace-no-wrap underline"
            href="{{ route('clan.view', ['clan' => $log->invited_player_clan_id]) }}">
            {{ $log->inviteeClan->name }}
        </a>
    @endif to party {{ $log->group_name }}
    @break
@endswitch
