@php /** @var \App\Models\Account $account */ @endphp
<div>
    <a class="whitespace-no-wrap underline" href="{{ route('account.view', ['account' => $account->uid]) }}">{{ $account->name }}</a> ({{ $account->uid }}
</div>
