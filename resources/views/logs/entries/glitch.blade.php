@php /** @var \App\Models\GlitchLog $log */ @endphp
<a
    class="whitespace-no-wrap underline"
    href="{{ route('account.view', ['account' => $log->account_uid]) }}">
    {{ $log->account->name }}
</a>
@switch($log->action)
    @case('Test')
    glitched
    @break
@endswitch
though <p
    class="whitespace-no-wrap">
    {{ __($log->construction->class) }}
</p> at {{ $log->pos }}
