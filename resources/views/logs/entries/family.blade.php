@php /** @var \App\Models\FamilyLog $log */ @endphp
@livewire('display-account', ['account' => $log->sourceAccount])
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
    failed to invite player @livewire('display-account', ['account' => $log->targetAccount])
    @break
    @case('Leave')
    left the family {{ $log->clan->name }}
    @break
    @case('Invited')
    invited player @livewire('display-account', ['account' => $log->targetAccount]) to join
    @break
    @case('InviteAccepted')
    invited player @livewire('display-account', ['account' => $log->targetAccount]) and it was accepted!
    @break
    @case('InviteDeclined')
    invited player @livewire('display-account', ['account' => $log->targetAccount]) and it was declined
    @break
    @case('Kicked')
    kicked player @livewire('display-account', ['account' => $log->targetAccount]) from the family
    @break
@endswitch
