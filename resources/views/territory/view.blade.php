@extends('layouts.app')

@section('content')
    <div class="w-full card-sg py-8 text-center">
        <h1 class="block mx-auto text-5xl">{{$territory->name}}</h1>
        <p class="block mx-auto text-2xl">ID: {{$territory->id}}</p>
        <p class="block mx-auto text-3xl">{{config('portal.instanceName')}}</p>
    </div>
    <h1 class="text-sg-red my-8 text-center text-5xl">Territory Information</h1>
    <div class="w-3/4 grid grid-cols-3 gap-8 mx-auto">
        <div class="card-header-sg p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Level</p>
            <p class="text-2xl">{{ $territory->level }}</p>
        </div>
        <div class="card-header-sg p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Owner</p>
            <a class="text-2xl underline" href="{{ route('account.view', ['account' => $territory->owner_uid]) }}">{{ $territory->ownerAccount->name }}</a>
        </div>
        <div class="card-header-sg p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Members</p>
            <p class="text-2xl">{{ $territory->members->count() }}</p>
        </div>
        @if($territory->flag_stolen)
            <div class="card-header-sg p-6 rounded-2xl shadow-lg text-center">
                <p class="text-lg">Stolen on:</p>
                <p class="text-2xl">{{ Illuminate\Support\Carbon::make($territory->flag_stolen_at)->diffForHumans() }}</p>
            </div>
            <div class="card-header-sg p-6 rounded-2xl shadow-lg text-center">
                <p class="text-lg">Stolen?</p>
                <p class="text-2xl">{{ $territory->flag_stolen ? 'YES' : 'NO'}}</p>
            </div>
            <div class="card-header-sg p-6 rounded-2xl shadow-lg text-center">
                <p class="text-lg">Stolen by</p>
                @if($territory->flag_stolen)
                    <p class="text-2xl">{{ $territory->territoryFlagStealer->name }}</p>
                @else
                    <p class="text-2xl">No one</p>
                @endif
            </div>
        @endif
        <div class="card-header-sg p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Last payment</p>
            <p class="text-2xl">{{ \Illuminate\Support\Carbon::make($territory->last_paid_at)->diffForHumans() }}</p>
        </div>
        <div class="card-header-sg p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Position</p>
            <p class="text-2xl">[{{ $territory->position_x }},{{ $territory->position_y }},{{ $territory->position_z }}]</p>
        </div>
        <div class="card-header-sg p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Created</p>
            <p class="text-2xl">{{ \Illuminate\Support\Carbon::make($territory->created_at)->diffForHumans() }}</p>
        </div>
    </div>
    <h1 class="text-sg-red my-8 text-center text-5xl">Container Contents - Currently {{$territory->containerContent->sum('count')}}</h1>
    @livewire('container-content', ['territory' => $territory])
@endsection
