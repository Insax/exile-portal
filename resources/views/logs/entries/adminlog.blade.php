@php /** @var \App\Models\AdminLog log */ @endphp

{{ \Carbon\Carbon::make($log->time)->diffForHumans() }} <a class="whitespace-nowrap underline" href="{{ route('account.view', ['account', $log->account_uid]) }}">{{ $log->account->name }}</a> used: {{ $this->log->log }}
