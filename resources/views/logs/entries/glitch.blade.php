@php /** @var \App\Models\GlitchLog $log */ @endphp
@include('livewire.display-account', ['$uid' => $log->account->uid, 'name' => $log->account->name])
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
