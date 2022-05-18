@php /** @var \App\Models\InmateMarketLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->buyer_account_uid, 'name' => $log->buyerAccount->name])
bought {{ __($log->item_class) }} for {{ $log->price }} Poptabs from
@include('livewire.display-account', ['uid' => $log->seller_account_uid, 'name' => $log->sellerAccount->name])
