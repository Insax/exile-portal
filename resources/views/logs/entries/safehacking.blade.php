@php /** @var \App\Models\SafeHackingLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->account->uid, 'name' => $log->account->name])&nbsp;
@if($log->clan_id)
    in Family&nbsp; <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>&nbsp;
@endif
@switch($log->action)
    @case('COMPLETED')
    completed hacking&nbsp;
    @break
    @case('Cancelled')
    cancelled hacking&nbsp;
    @break
    @case('Failed')
    failed hacking&nbsp;
    @break
    @case('Interrupted')
    interrupted hacking&nbsp;
    @break
    @case('Started')
    started hacking&nbsp;
    @break
@endswitch
{{ __($log->container->class) }} of Territory <a
    class="whitespace-no-wrap underline"
    href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
    {{ $log->territory->name }}
</a> at position {{ $log->player_pos }}, {{ $log->hack_attempts }} so far
