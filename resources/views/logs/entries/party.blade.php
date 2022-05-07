@php /** @var \App\Models\PartyLog $log */ @endphp
@livewire('display-account', ['account' => $log->account])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
@switch($log->action)
    @case('Invite')
    invited Player @livewire('display-account', ['account' => $log->inviteeAccount])
    @if($log->invited_player_clan_id)
        in Family <a
            class="whitespace-no-wrap underline"
            href="{{ route('clan.view', ['clan' => $log->invited_player_clan_id]) }}">
            {{ $log->inviteeClan->name }}
        </a>
    @endif to party {{ $log->group_name }}
    @break
@endswitch
