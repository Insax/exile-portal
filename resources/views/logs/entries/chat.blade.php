@php /** @var \App\Models\ChatLog $log */ @endphp
@livewire('display-account', ['account' => $log->sender])
sent Message: [{{ $log->message }}] to
@livewire('display-account', ['account' => $log->recipient])
