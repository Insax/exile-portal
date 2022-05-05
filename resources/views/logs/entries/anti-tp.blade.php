@php /** @var \App\Models\AntiTeleportLog $log */ @endphp
<a
    class="whitespace-no-wrap underline"
    href="{{ route('account.view', ['account' => $log->account_uid]) }}">
    {{ $log->account->name }}
</a> teleported {{ $log->distance }} from {{ $log->old_pos }} to {{ $log->new_pos }}
@if(!empty($log->vehicle_class))
    sitting in a {{ __($log->vehicle_class) }}
@endif
, TPCount = {{ $log->tp_count }}
