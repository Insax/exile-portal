@php /** @var \App\Models\InmateMarketLog $log */ @endphp
<a
    class="whitespace-no-wrap underline"
    href="{{ route('account.view', ['account' => $log->buyer_account_uid]) }}">
    {{ $log->buyerAccount->name }}
</a>
bought {{ __($log->item_class) }} for {{ $log->price }} Poptabs from
<a
    class="whitespace-no-wrap underline"
    href="{{ route('account.view', ['account' => $log->seller_account_uid]) }}">
    {{ $log->sellerAccount->name }}
</a>
