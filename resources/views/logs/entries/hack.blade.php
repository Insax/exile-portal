@php /** @var \App\Models\HackLog $log */ @endphp
<a
    class="whitespace-no-wrap underline"
    href="{{ route('account.view', ['account' => $log->old_account_uid]) }}">
    {{ $log->oldAccount->name }}
</a> switched accounts - new Account:
<a
    class="whitespace-no-wrap underline"
    href="{{ route('account.view', ['account' => $log->new_account_uid]) }}">
    {{ $log->newAccount }}
</a>
