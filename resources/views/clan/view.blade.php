@extends('layouts.app')

@section('content')
    <div class="w-full card-portal py-8 text-center">
        <h1 class="block mx-auto text-5xl">{{$clan->name}}</h1>
        <p class="block mx-auto text-2xl">ID: {{$clan->id}}</p>
        <p class="block mx-auto text-3xl">{{config('portal.instanceName')}}</p>
        <p class="block mx-auto">
            <button type="button"
                    class="inline-block px-6 py-2.5 btn-portal font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out"
                    onclick='Livewire.emit("openModal", "set-clan-info", {{ json_encode(["clan" => $clan->id]) }})'>
                Set Note on Clan
            </button>
        </p>
    </div>
    <h1 class="text-portal-red my-8 text-center text-5xl">Clan Information</h1>
    <div class="w-3/4 grid grid-cols-3 gap-8 mx-auto">
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Created</p>
            <p class="text-2xl">{{ \Illuminate\Support\Carbon::make($clan->created_at)->diffForHumans() }}</p>
        </div>
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Leader</p>
            <a class="text-2xl underline" href="{{ route('account.view', ['account' => $clan->leader_uid]) }}">{{ $clan->account->name }}</a>
        </div>
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Members</p>
            <p class="text-2xl">{{ $clan->accounts->count() }}</p>
        </div>
    </div>
    @if(count($activities))
        <div class="container mx-auto px-4 sm:px-8 container-portal mt-10">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">Clan Notes</h2>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead class="container-portal">
                            <tr>
                                <th
                                    class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                    {{ __('Time') }}
                                </th>
                                <th
                                    class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                    {{ __('By') }}
                                </th>
                                <th
                                    class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                    {{ __('Reason') }}
                                </th>
                            </tr>
                            </thead>
                            <tbody class="container-portal">
                            @foreach($activities as $activity)
                                <tr class="table-row-portal">
                                    <td class="px-5 py-5 text-center text-sm">
                                        <p class="whitespace-no-wrap">{{ \Carbon\Carbon::make($activity->created_at)->diffForHumans() }} </p>
                                    </td>
                                    <td class="px-5 py-5 text-center text-sm">
                                        <p class="whitespace-no-wrap">{{ $activity->causer->name }}</p>
                                    </td>
                                    <td class="px-5 py-5 text-center text-sm">
                                        <p class="whitespace-no-wrap uppercase">{{ $activity->description }}</p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
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
                    <a class="text-2xl underline" href="{{ route('account.view', ['account' => $territory->owner_uid]) }}">{{ $territory->account->name }}</a>
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
