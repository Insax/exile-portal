@php /** @var \App\Models\CraftingLog $log */ @endphp
@livewire('display-account', ['account' => $log->account])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
crafted {{ $log->amount }} {{ __($log->returned_item_class) }} using {{ $log->recipe_class_name }}
