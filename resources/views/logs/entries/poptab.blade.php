@php /** @var \App\Models\PoptabLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->account->uid, 'name' => $log->account->name])&nbsp;
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>&nbsp;
@endif
@switch($log->action)
    @case('Take')
    took {{ $log->amount }} Poptabs from&nbsp;
    @break
    @case('Deposited')
    deposited {{ $log->amount }} Poptabs to&nbsp;
    @break
@endswitch
{{ __($log->container_class) }}, they had {{ $log->player_before }}, have now {{ $log->player_after }}, container had {{ $log->container_before }}, has now {{ $log->container_after }}
