@php /** @var \App\Models\ChatLog $log */ @endphp
<a
    class="whitespace-no-wrap underline"
    href="{{ route('account.view', ['account' => $log->sender_uid]) }}">
    {{ $log->sender->name }}
</a>
sent Message: [{{ $log->message }}] to
<a
    class="whitespace-no-wrap underline"
    href="{{ route('account.view', ['account' => $log->recipient_uid]) }}">
    {{ $log->recipient->name }}
</a>
