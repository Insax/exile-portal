@extends('layouts.app')

@section('content')
    <div class="w-full card-portal py-8 text-center">
        <h1 class="block mx-auto text-5xl">{{$clan->name}}</h1>
        <p class="block mx-auto text-2xl">ID: {{$clan->id}}</p>
        <p class="block mx-auto text-3xl">{{config('portal.instanceName')}}</p>
    </div>
    <h1 class="text-portal-red my-8 text-center text-5xl">Clan Information</h1>
    <div class="w-3/4 grid grid-cols-3 gap-8 mx-auto">
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Created</p>
            <p class="text-2xl">{{ \Illuminate\Support\Carbon::make($clan->created_at)->diffForHumans() }}</p>
        </div>
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Leader</p>
            <a class="text-2xl underline" href="{{ route('account.view', ['account' => $clan->leader_uid]) }}">{{ $clan->leaderAccount->name }}</a>
        </div>
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Members</p>
            <p class="text-2xl">{{ $clan->accounts->count() }}</p>
        </div>
    </div>
    @livewire('clan-members', ['clan' => $clan])
    @if($territories)
        <h1 class="text-portal-red my-8 text-center text-3xl">Territory Information of {{ $clan->name }} - In Total Member of {{ $territories->count() > 1 ? $territories->count(). 'Territories' : '1 Territory' }} </h1>
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
                    <a class="text-2xl underline" href="{{ route('account.view', ['account' => $territory->owner_uid]) }}">{{ $territory->ownerAccount->name }}</a>
                </div>
                <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
                    <p class="text-lg">Stolen by</p>
                    @if($territory->flag_stolen)
                        <a class="text-2xl" href="{{ route('account.view', ['account' => $territory->flag_stolen_by_uid]) }}">{{ $territory->territoryFlagStealer->name }}</a>
                    @else
                        <p class="text-2xl">No one</p>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
@endsection
