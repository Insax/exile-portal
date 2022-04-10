@php /** @var \App\Models\AntiTPLog log */ @endphp

{{ \Carbon\Carbon::make($log->time)->diffForHumans() }} Player <a class="whitespace-nowrap underline" href="{{ route('account.view', ['account', $log->account_uid]) }}">{{ $log->account->name }} </a> moved {{$log->distance}} in {{$log->movement_time}} Seconds, from {{ $log->position_before }} to {{ $log->position_after }} @if($log->vehicle_class != 'Exile_Unit_Player') in Vehicle {{ __($log->vehicle_class) }} @else walking @endif TP Count: {{ $log->tp_count }}
