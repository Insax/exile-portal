@php /** @var \App\Models\AntiTeleportLog $log */ @endphp
@include('livewire.display-account', ['account' => $log->account])
teleported {{ $log->distance }} from {{ $log->old_pos }} to {{ $log->new_pos }}
@if(!empty($log->vehicle_class))
    sitting in a {{ __($log->vehicle_class) }}
@endif
, TPCount = {{ $log->tp_count }}
