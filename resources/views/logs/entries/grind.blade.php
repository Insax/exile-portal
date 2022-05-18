@php /** @var \App\Models\GrindingLog $log */ @endphp
@include('display-account', ['account' => $log->account])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
@switch($log->action)
    @case('Started')
    started to grind
    @break
    @case('Completed')
    completed grinding
    @break
@endswitch
a {{ __($log->construction->class) }} of Territory <a
    class="whitespace-no-wrap underline"
    href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
    {{ $log->territory->name }}
</a>
