@php /** @var \App\Models\FamilyLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->source_account_uid, 'name' => $log->sourceAccount->name])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
@switch($log->action)
    @case('Created')
    created the family {{ $log->clan->name }}
    @break
    @case('InviteFailed')
    invited a player and it failed.
    @break
    @case('Leave')
    left the family {{ $log->clan->name }}
    @break
    @case('Invited')
    @if($log->targetAccount)
        invited player @include('livewire.display-account', ['uid' => $log->target_account_uid, 'name' => $log->targetAccount->name]) to join
    @else
        invited unknown player to join
    @endif
    @break
    @case('InviteAccepted')
    @if($log->targetAccount)
        invited player @include('livewire.display-account', ['uid' => $log->target_account_uid, 'name' => $log->targetAccount->name]) and it was accepted!
    @else
        invited unknown player to join and it was accepted
    @endif
    @break
    @case('InviteDeclined')
    @if($log->targetAccount)
    invited player @include('livewire.display-account', ['uid' => $log->target_account_uid, 'name' => $log->targetAccount->name]) and it was declined
    @else
        invited unknown player to join and it was declined
    @endif
    @break
    @case('Kicked')
    @if($log->targetAccount)
    kicked player @include('livewire.display-account', ['uid' => $log->target_account_uid, 'name' => $log->targetAccount->name]) from the family
    @else
        kicked unknown player from the Family
    @endif
    @break
@endswitch
