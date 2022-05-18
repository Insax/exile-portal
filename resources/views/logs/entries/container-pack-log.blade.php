@php /** @var \App\Models\ContainerPackLog $log */ @endphp
@include('livewire.display-account, ['account' => $log->account])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
packed container {{ __($log->container->class) }} at position {{ $log->container_pos }}
in Territory
<a
    class="whitespace-no-wrap underline"
    href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
    {{ $log->territory->name }}
</a>
