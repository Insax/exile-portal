@php /** @var \App\Models\GlitchLog $log */ @endphp
@livewire('display-account', ['account' => $log->account])
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
