@php /** @var \App\Models\BreachingLog $log */ @endphp
@include('livewire.display-account', ['account' => $log->account])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
{{ __($log->action) }} a {{ __($log->charge_class) }}
on a {{ __($log->construction->class) }} at Position {{ $log->position }} in Territory
<a
    class="whitespace-no-wrap underline"
    href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
    {{ $log->territory->name }}
</a>
