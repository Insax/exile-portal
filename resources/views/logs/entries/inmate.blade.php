@php /** @var \App\Models\InmateMarketLog $log */ @endphp
@include('display-account', ['account' => $log->buyerAccount])
bought {{ __($log->item_class) }} for {{ $log->price }} Poptabs from
@include('display-account', ['account' => $log->sellerAccount])
