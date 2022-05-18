@php /** @var \App\Models\FamilyLog $log */ @endphp
@include('livewire.display-account', ['account' => $log->sourceAccount])
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
    failed to invite player @include('livewire.display-account', ['account' => $log->targetAccount])
    @break
    @case('Leave')
    left the family {{ $log->clan->name }}
    @break
    @case('Invited')
    invited player @include('livewire.display-account', ['account' => $log->targetAccount]) to join
    @break
    @case('InviteAccepted')
    invited player @include('livewire.display-account', ['account' => $log->targetAccount]) and it was accepted!
    @break
    @case('InviteDeclined')
    invited player @include('livewire.display-account', ['account' => $log->targetAccount]) and it was declined
    @break
    @case('Kicked')
    kicked player @include('livewire.display-account', ['account' => $log->targetAccount]) from the family
    @break
@endswitch
