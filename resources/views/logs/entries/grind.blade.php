@php /** @var \App\Models\GrindingLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->account->uid, 'name' => $log->account->name])&nbsp;
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>&nbsp;
@endif
@switch($log->action)
    @case('Started')
    started to grind&nbsp;
    @break
    @case('Completed')
    completed grinding&nbsp;
    @break
@endswitch
a {{ __($log->construction->class) }} of Territory <a
    class="whitespace-no-wrap underline"
    href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
    {{ $log->territory->name }}
</a>&nbsp;
