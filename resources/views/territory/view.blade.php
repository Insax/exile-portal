@extends('layouts.app')

@section('content')
    <div class="w-full card-portal py-8 text-center">
        <h1 class="block mx-auto text-5xl">{{$territory->name}}</h1>
        <p class="block mx-auto text-2xl">ID: {{$territory->id}}</p>
        <p class="block mx-auto text-3xl">{{config('portal.instanceName')}}</p>
        @can('territory.manage')
            <p class="block mx-auto">
                <button type="button"
                        class="inline-block px-6 py-2.5 btn-portal font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out"
                        onclick='Livewire.emit("openModal", "delete-or-restore-territory", {{ json_encode(["territory" => $territory->id]) }})'>
                    @if(!$territory->deleted_at)
                        Delete Territory!
                    @else
                        Restore Territory!
                    @endif
                </button>
            </p>
        @endcan
    </div>
    <h1 class="text-portal-red my-8 text-center text-5xl">Territory Information</h1>
    <div class="w-3/4 grid grid-cols-3 gap-8 mx-auto">
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Level</p>
            <p class="text-2xl">{{ $territory->level }}</p>
        </div>
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Owner</p>
            <a class="text-2xl underline" href="{{ route('account.view', ['account' => $territory->owner_uid]) }}">{{ $territory->ownerAccount->name }}</a>
        </div>
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Members</p>
            <p class="text-2xl">{{ $territory->members->count() }}</p>
        </div>
        @if($territory->flag_stolen)
            <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
                <p class="text-lg">Stolen on:</p>
                <p class="text-2xl">{{ Illuminate\Support\Carbon::make($territory->flag_stolen_at)->diffForHumans() }}</p>
            </div>
            <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
                <p class="text-lg">Stolen?</p>
                <p class="text-2xl">{{ $territory->flag_stolen ? 'YES' : 'NO'}}</p>
            </div>
            <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
                <p class="text-lg">Stolen by</p>
                @if($territory->flag_stolen)
                    <a class="text-2xl" href="{{ route('account.view', ['account' => $territory->flag_stolen_by_uid]) }}">{{ $territory->territoryFlagStealer->name }}</a>
                @else
                    <p class="text-2xl">No one</p>
                @endif
            </div>
        @endif
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Last payment</p>
            <p class="text-2xl">{{ \Illuminate\Support\Carbon::make($territory->last_paid_at)->diffForHumans() }}</p>
        </div>
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Position</p>
            <p class="text-2xl">[{{ $territory->position_x }},{{ $territory->position_y }},{{ $territory->position_z }}]</p>
        </div>
        <div class="card-header-portal p-6 rounded-2xl shadow-lg text-center">
            <p class="text-lg">Protection due</p>
            <p class="text-2xl">{{ \Illuminate\Support\Carbon::make($territory->last_paid_at)->addDays(8)->diffForHumans() }}</p>
        </div>
    </div>
    @if($activities)
        <div class="container mx-auto px-4 sm:px-8 container-portal mt-10">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">Already performed activities</h2>
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
                                    {{ __('Action') }}
                                </th>
                                <th
                                    class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                    {{ __('Extra Information') }}
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
                                        <p class="whitespace-no-wrap uppercase">{{ $activity->getExtraProperty('activity') }}</p>
                                    </td>
                                    <td class="px-5 py-5 text-center text-sm">
                                        <p class="whitespace-no-wrap uppercase">{{ $activity->getExtraProperty('advance') ? $activity->getExtraProperty('advance') : 'N/A' }}</p>
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

    @livewire('territory-members', ['territory' => $territory])
    @can('territory.inventory')
        <h1 class="text-portal-red my-8 text-center text-3xl">Container Contents - Currently {{$territory->containerContent->sum('count')}}</h1>
        @livewire('container-content', ['territory' => $territory])
    @endcan
@endsection
