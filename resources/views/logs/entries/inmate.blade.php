@php /** @var \App\Models\InmateMarketLog $log */ @endphp
@include('livewire.display-account', ['account' => $log->buyerAccount])
bought {{ __($log->item_class) }} for {{ $log->price }} Poptabs from
@include('livewire.display-account', ['account' => $log->sellerAccount])
