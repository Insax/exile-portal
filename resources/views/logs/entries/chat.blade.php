@php /** @var \App\Models\ChatLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->sender_uid, 'name' => $log->sender->name])
sent Message: [{{ $log->message }}] to
@include('livewire.display-account', ['uid' => $log->recipient_uid, 'name' => $log->recipient->name])
