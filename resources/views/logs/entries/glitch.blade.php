@php /** @var \App\Models\GlitchLog $log */ @endphp
<a
    class="whitespace-no-wrap underline"
    href="{{ route('account.view', ['account' => $log->account_uid]) }}">
    {{ $log->account->name }}
</a>
@switch($log->action)
    @case('WallCheck')
    tried to glitch using a vehicle
    @break
    @case('WallIntersect')
    tried glitch
    @break
@endswitch
through <p
    class="whitespace-no-wrap">
    {{ __($log->construction->class) }}
</p> at {{ $log->pos }}
