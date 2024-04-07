@php /** @var \App\Models\AntiTeleportLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->account->uid, 'name' => $log->account->name])
teleported {{ $log->distance }} from {{ $log->old_pos }} to {{ $log->new_pos }}&nbsp;
@if(!empty($log->vehicle_class))
    sitting in a {{ __($log->vehicle_class) }}&nbsp;
@endif
, TPCount = {{ $log->tp_count }}
