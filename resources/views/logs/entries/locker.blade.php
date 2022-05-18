@php /** @var \App\Models\LockerLog $log */ @endphp
@include('livewire.display-account', ['account' => $log->account])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
@switch($log->action)
    @case('Withdrawn')
    withdrew {{ $log->amount }} Poptabs from
    @break
    @case('Deposited')
    deposited {{ $log->amount }} Poptabs to
    @break
@endswitch
their locker, they had {{ $log->player_before }}, have now {{ $log->player_after }}, locker had {{ $log->locker_before }}, has now {{ $log->locker_after }}
