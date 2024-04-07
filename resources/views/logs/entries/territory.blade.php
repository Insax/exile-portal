@php /** @var \App\Models\TerritoryLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->account->uid, 'name' => $log->account->name])&nbsp;
@if($log->clan_id)
    in Family&nbsp; <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>&nbsp;
@endif
@switch($log->action)
    @case('Purchase')
    Purchased a Territory Flag Kit - Price {{ $log->fee }} - Player Had {{ $log->poptabs_before }}, has now {{ $log->poptabs_after }}&nbsp;
    @break
    @case('Upgrade')
    upgraded the Territory <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}
    </a> for {{ $log->fee }}, Player had {{ $log->poptabs_before }}, has now {{ $log->poptabs_after }}&nbsp;
    @break
    @case('Raidmode')
    initiated Raidmode for Territory <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}&nbsp;
    </a> at Position {{ $log->player_pos }}
    @break
    @case('Stolen')
    stole the Flag of Territory <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}
    </a> at Position {{ $log->player_pos }}&nbsp;
    @case('Restore')
    restored territory <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}&nbsp;
    </a>
    @break
    @case('Payransom')
        payed ransom for <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}
    </a>, fee {{ $log->fee }} Poptabs&nbsp;
    @break
    @case('Add')
     invited player @include('livewire.display-account', ['uid' => $log->target_account_uid, 'name' => $log->targetAccount->name]) to Territory <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}
    </a>&nbsp;
    @break;
@endswitch
