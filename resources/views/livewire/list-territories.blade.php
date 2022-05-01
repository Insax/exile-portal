@php
/** @var App\Models\Territory $territory */
@endphp
<div>
    <div class="container mx-auto px-4 sm:px-8 container-portal mt-10">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Territory Overview</h2>
            </div>
            <div class="my-2 flex sm:flex-row flex-col items-center">
                <div class="flex flex-row mb-1 sm:mb-0">
                    <div class="relative">
                        <select wire:model="items"
                                class="appearance-none h-full rounded-r border block appearance-none w-full py-2 px-4 pr-8 leading-tight">
                            @foreach($amounts as $key => $amount)
                                <option {{ $key != 'default' ? : 'selected="selected"' }}> {{ $amount }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative">
                        <select wire:model="type"
                            class="rounded-none h-full none border-t block appearance-none w-full py-2 px-4 pr-8 leading-tight">
                            @foreach($types as $key => $type)
                                <option {{ $key != 'default' ? : 'selected="selected"' }}> {{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative">
                        <select wire:model="sorting"
                                class="rounded-none h-full none border-t block appearance-none w-full py-2 px-4 pr-8 leading-tight">
                            @foreach($sorts as $key => $type)
                                <option {{ $key != 'default' ? : 'selected="selected"' }}> {{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative">
                        <select wire:model="sortType"
                                class="rounded-none h-full none border-t block appearance-none w-full py-2 px-4 pr-8 leading-tight">
                            <option selected="selected">ASC</option>
                            <option>DESC</option>
                        </select>
                    </div>
                </div>
                <div class="block relative">
                    <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current">
                            <path
                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                            </path>
                        </svg>
                    </span>
                    <input placeholder="Search for a Name..." wire:model="name"
                           type="text" class="rounded-l sm:rounded-l-none block pl-8 pr-6 py-2 w-full text-sm" />
                </div>
                <div>
                    <h2 class="text-2xl font-semibold leading-tight ml-2">Current Selection: {{ $this->type }}</h2>
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="min-w-full shadow rounded-lg overflow-hidden">
                    {{ $territories->links() }}
                    <table class="min-w-full leading-normal">
                        <thead class="container-portal">
                        <tr>
                            <th
                                class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                #ID
                            </th>
                            <th
                                class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                Name
                            </th>
                            <th
                                class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                {{ __('Owner Name') }}
                            </th>
                            <th
                                class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                {{ __('Owner ID') }}
                            </th>
                            @if($this->type == 'Stolen')
                                    <th class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                        Stolen By
                                    </th>
                                    <th class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                        Stealer ID
                                    </th>
                                    <th class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                        Stolen at
                                    </th>
                                @can('territory.manage')
                                    <th
                                        class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                        Restore Flag
                                    </th>
                                @endcan
                            @endif
                            <th
                                class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                Members
                            </th>
                        </tr>
                        </thead>
                        <tbody class="container-portal">
                        @foreach($territories as $territory)
                        <tr class="table-row-portal">
                            <td class="px-5 py-5 text-center text-sm">
                                <p class="whitespace-no-wrap">{{ $territory->id }}</p>
                            </td>
                            <td class="px-5 py-5 text-center text-sm">
                                <a class="whitespace-no-wrap underline" href="{{ route('territory.view', ['territory' => $territory->id]) }}">{{ $territory->name }}</a>
                            </td>
                            <td class="px-5 py-5 text-center text-sm">
                                <a class="whitespace-no-wrap underline" href="{{ route('account.view', ['account' => $territory->owner_uid]) }}">{{ $territory->account->name }} </a>
                            </td>
                            <td class="px-5 py-5 text-center text-sm">
                                <a class="whitespace-no-wrap underline" href="{{ route('account.view', ['account' => $territory->owner_uid]) }}">{{ $territory->owner_uid }}</a>
                            </td>
                            @if($this->type == 'Stolen')
                                    <td class="px-5 py-5 text-center text-sm">
                                        <a class="whitespace-no-wrap underline" href="{{ route('account.view', ['account' => $territory->territoryFlagStealer->uid]) }}">{{ $territory->territoryFlagStealer->name }}</a>
                                    </td>
                                    <td class="px-5 py-5 text-center text-sm">
                                        <a class="whitespace-no-wrap underline" href="{{ route('account.view', ['account' => $territory->territoryFlagStealer->uid]) }}">{{ $territory->territoryFlagStealer->uid }}</a>
                                    </td>
                                    <td class="px-5 py-5 text-center text-sm">
                                        <p class="whitespace-no-wrap">{{ \Carbon\Carbon::make($territory->flag_stolen_at)->diffForHumans() }} ({{ $territory->flag_stolen_at }})</p>
                                    </td>
                                @can('territory.manage')
                                    <td class="px-5 py-5 text-center text-sm">
                                        <button type="button"
                                                class="inline-block px-6 py-2.5 btn-portal font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out"
                                                wire:click='$emit("openModal", "unsteal-territory", {{ json_encode(["territory" => $territory->id]) }})'>
                                            Restore Flag!
                                        </button>
                                    </td>
                                @endcan
                            @endif
                            <td class="px-5 py-5 text-center text-sm">
                                <p class="whitespace-no-wrap">{{ $territory->territoryMember->count() }}</p>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $territories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
