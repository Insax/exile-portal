@php /** @var \App\Models\BanLog log */ @endphp

{{ \Carbon\Carbon::make($log->time)->diffForHumans() }} Player <a class="whitespace-nowrap underline" href="{{ route('account.view', ['account', $log->account_uid]) }}">{{ $log->account->name }} </a> got banned, Reason: {{ $log->reason }}, Successful: {{ $log->banned ? 'Yes' : 'No' }}
