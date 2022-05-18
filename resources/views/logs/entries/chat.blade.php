@php /** @var \App\Models\ChatLog $log */ @endphp
@include('display-account', ['account' => $log->sender])
sent Message: [{{ $log->message }}] to
@include('display-account', ['account' => $log->recipient])
