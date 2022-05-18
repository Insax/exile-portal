@php /** @var \App\Models\HackLog $log */ @endphp
@include('display-account', ['account' => $log->oldAccount]) switched accounts - new Account:
@include('display-account', ['account' => $log->newAccount])
