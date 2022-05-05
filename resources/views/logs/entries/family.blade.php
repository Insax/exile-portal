@php /** @var \App\Models\FamilyLog $log */ @endphp
<a
    class="whitespace-no-wrap underline"
    href="{{ route('account.view', ['account' => $log->source_account_uid]) }}">
    {{ $log->sourceAccount->name }}
</a>
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
    failed to invite player <a
        class="whitespace-no-wrap underline"
        href="{{ route('account.view', ['account' => $log->target_account_uid]) }}">
        {{ $log->targetAccount->name }}
    </a>
    @break
    @case('Leave')
    left the family {{ $log->clan->name }}
    @break
    @case('Invited')
    invited player <a
        class="whitespace-no-wrap underline"
        href="{{ route('account.view', ['account' => $log->target_account_uid]) }}">
        {{ $log->targetAccount->name }}
    </a> to join
    @break
    @case('InviteAccepted')
    invited player<a
        class="whitespace-no-wrap underline"
        href="{{ route('account.view', ['account' => $log->target_account_uid]) }}">
        {{ $log->targetAccount->name }}
    </a> and it was accepted!
    @break
    @case('InviteDeclined')
    invited player <a
        class="whitespace-no-wrap underline"
        href="{{ route('account.view', ['account' => $log->target_account_uid]) }}">
        {{ $log->targetAccount->name }}
    </a> and it was declined
    @break
    @case('Kicked')
    kicked player <a
        class="whitespace-no-wrap underline"
        href="{{ route('account.view', ['account' => $log->target_account_uid]) }}">
        {{ $log->targetAccount->name }}
    </a> from the family
    @break
@endswitch
