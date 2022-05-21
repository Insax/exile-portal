@extends('layouts.app')

@section('content')
    <div class="w-full card-portal py-8 text-center">
        <h1 class="block mx-auto text-5xl">{{$account->name}}</h1>
        <p class="block mx-auto text-2xl">{{$account->uid}}</p>
        <p class="block mx-auto text-3xl">{{config('portal.instanceName')}}</p>
        <p class="block mx-auto">
            <a type="button"
                    class="inline-block px-6 py-2.5 btn-portal font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out"
                    href="{{ route('logs.list', ['startDate' => \Carbon\Carbon::now()->subDays(3)->toDateString(), 'endDate' => \Carbon\Carbon::now()->toDateString(), 'searchString' => $account->uid]) }}">
                Show Logs
            </a>
        </p>
    </div>
    <h1 class="text-portal-red my-8 text-center text-5xl">Player Information</h1>
    <div class="w-3/4 grid grid-cols-3 gap-8 mx-auto">
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Respect</p>
            <p class="text-2xl">{{ $account->score }}</p>
        </div>
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Family</p>
            @if($account->clan)
                <a class="text-2xl underline" href="{{ route('clan.view', ['clan' => $account->clan_id]) }}">{{ $account->clan->name }}</a>
            @else
                <p class="text-2xl">None</p>
            @endif
        </div>
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Last Connection</p>
            <p class="text-2xl">{{ \Illuminate\Support\Carbon::make($account->last_connect_at)->diffForHumans() }} ({{ $account->last_connect_at }})</p>
        </div>
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Player EXP Level</p>
            <p class="text-2xl">{{ $account->exp_level }}</p>
        </div>
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Locker</p>
            <p class="text-2xl">{{ $account->locker }} Poptabs</p>
        </div>
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Total Connections</p>
            <p class="text-2xl">{{ $account->total_connections }}</p>
        </div>
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Kills</p>
            <p class="text-2xl">{{ $account->kills }}</p>
        </div>
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            @can('exp.reset')
                <p class="text-lg">Reset EXP</p>
                    @if($account->last_connect_at > $account->last_disconnect_at)
                        <p class="text-2xl"> Player is online! Can't do it!</p>
                    @else
                        <button onclick='Livewire.emit("openModal", "reset-exp", {{ json_encode(["account" => $account->uid]) }})' class="btn-portal mb-6 w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline btn-portal sm:py-4">Reset Exp</button>
                    @endif
            @else
                <p class="text-lg">Total EXP</p>
                <p class="text-2xl">{{ $account->exp_total }}</p>
            @endcan

        </div>
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Deaths</p>
            <p class="text-2xl">{{ $account->deaths }}</p>
        </div>
    </div>
    @if($territories->count())
        <h1 class="text-portal-red my-8 text-center text-3xl">Territory Information - Member of {{ $territories->count() > 1 ? $territories->count(). 'Territories' : '1 Territory' }} </h1>
        <div class="w-3/4 grid grid-cols-3 gap-8 mx-auto">
            @foreach($territories as $territory)
                <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
                    <p class="text-lg">Level</p>
                    <p class="text-2xl">{{ $territory->level }}</p>
                </div>
                <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
                    <p class="text-lg">Territory Name</p>
                    <a class="text-2xl underline" href="{{ route('territory.view', ['territory' => $territory->id]) }}">{{ $territory->name }}</a>
                </div>
                <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
                    <p class="text-lg">Last payment</p>
                    <p class="text-2xl">{{ \Illuminate\Support\Carbon::make($territory->last_paid_at)->diffForHumans() }}</p>
                </div>
                <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
                    <p class="text-lg">Stolen?</p>
                    <p class="text-2xl">{{ $territory->flag_stolen ? 'YES' : 'NO'}}</p>
                </div>
                <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
                    <p class="text-lg">Territory Leader</p>
                    <a class="text-2xl underline" href="{{ route('account.view', ['account' => $territory->owner_uid]) }}">{{ $territory->account->name }}</a>
                </div>
                <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
                    <p class="text-lg">Stolen by</p>
                    @if($territory->flag_stolen)
                        <p class="text-2xl">{{ $territory->territoryFlagStealer->name }}</p>
                    @else
                        <p class="text-2xl">No one</p>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
@endsection
