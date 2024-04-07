@php /** @var \App\Models\GlitchLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->account->uid, 'name' => $log->account->name])&nbsp;
@switch($log->action)
    @case('WallCheck')
    tried to glitch using a vehicle&nbsp;
    @break
    @case('WallIntersect')
    tried glitch&nbsp;
    @break
@endswitch
through <p
    class="whitespace-no-wrap">
    {{ __($log->construction->class) }}
</p> at {{ $log->pos }}
