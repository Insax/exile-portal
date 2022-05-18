@php /** @var \App\Models\ChatLog $log */ @endphp
@include('livewire.display-account', ['account' => $log->sender])
sent Message: [{{ $log->message }}] to
@include('livewire.display-account', ['account' => $log->recipient])
