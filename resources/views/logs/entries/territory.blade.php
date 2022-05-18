@php /** @var \App\Models\TerritoryLog $log */ @endphp
@include('livewire.display-account', ['uid' => $log->account->uid, 'name' => $log->account->name])
@if($log->clan_id)
    in Family <a
        class="whitespace-no-wrap underline"
        href="{{ route('clan.view', ['clan' => $log->clan_id]) }}">
        {{ $log->clan->name }}
    </a>
@endif
@switch($log->action)
    @case('Purchase')
    Purchased a Territory Flag Kit - Price {{ $log->fee }} - Player Had {{ $log->poptabs_before }}, has now {{ $log->poptabs_after }}
    @break
    @case('Upgrade')
    upgraded the Territory <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}
    </a> for {{ $log->fee }}, Player had {{ $log->poptabs_before }}, has now {{ $log->poptabs_after }}
    @break
    @case('Raidmode')
    initiated Raidmode for Territory <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}
    </a> at Position {{ $log->player_pos }}
    @break
    @case('Stolen')
    stole the Flag of Territory <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}
    </a> at Position {{ $log->player_pos }}
    @case('Restore')
    restored territory <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}
    </a>
    @break
    @case('Payransom')
        payed ransom for <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}
    </a>, fee {{ $log->fee }} Poptabs
    @break
    @case('Add')
     invited player @include('livewire.display-account', ['uid' => $log->target_account_uid, 'name' => $log->targetAccount->name]) to Territory <a
        class="whitespace-no-wrap underline"
        href="{{ route('territory.view', ['territory' => $log->territory_id]) }}">
        {{ $log->territory->name }}
    </a>
    @break;
@endswitch
