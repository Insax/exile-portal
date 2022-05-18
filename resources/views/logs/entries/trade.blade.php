@php /** @var \App\Models\TradeLog $log */ @endphp
@include('livewire.display-account', ['$uid' => $log->account->uid, 'name' => $log->account->name])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
@switch($log->action)
    @case('PurchaseVehicle')
    Purchased a {{ __($log->item_class) }} for {{ $log->price }} Poptabs, has now {{ $log->poptabs_after }} Poptabs
    @break
    @case('PurchaseItem')
    Purchased {{ $log->quantity }} of {{ $log->item_class }} for {{ $log->price }}, has now {{ $log->poptabs_after }} Poptabs
    @break
    @case('ItemSold')
    Sold {{ $log->quantity }} of {{ $log->item_class }} for {{ $log->price }}, gained {{ $log->sell_respect }} Respect for it, has now {{ $log->poptabs_after }} Poptabs and {{ $log->respect_after }} Respect
    @break
    @case('SellCrate')
    Sold the crate out of {{ __($log->item_class) }} for {{ $log->price }}, gained {{ $log->sell_respect }} Respect for it, has now {{ $log->poptabs_after }} Poptabs and {{ $log->respect_after }} Respect
    @break
    @case('SellWastdump')
    Waste dumped their {{ __($log->item_class) }} for {{ $log->price }}, gained {{ $log->sell_respect }} Respect for it, has now {{ $log->poptabs_after }} Poptabs and {{ $log->respect_after }} Respect
    @break
@endswitch
