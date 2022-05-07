@php /** @var \App\Models\InmateMarketLog $log */ @endphp
@livewire('display-account', ['account' => $log->buyerAccount])
bought {{ __($log->item_class) }} for {{ $log->price }} Poptabs from
@livewire('display-account', ['account' => $log->sellerAccount])
