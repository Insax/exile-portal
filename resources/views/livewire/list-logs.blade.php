@php
    /** @var App\Models\Territory $territory */
@endphp
<div>
    <div class="container mx-auto px-4 sm:px-8 container-portal mt-10">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Log Overview</h2>
            </div>
            <form wire:submit.prevent="search">
                <div class="my-2 flex sm:flex-row flex-col items-center">
                    <div class="flex flex-row mb-1 sm:mb-0 items-center input-group">
                        <btn type="button" class="rounded-l-full inline-block py-1.5 px-2 leading-tight relative flex flex-wrap items-stretch border border-portal-red bg-portal-gray rounded-l">
                            <div class="form-check form-switch items-center">
                                <input class="form-check-input appearance-none w-9 -ml-10 rounded-full float-left h-5 align-top btn-portal focus:outline-none bg-no-repeat cursor-pointer shadow-sm bg-portal-red" type="checkbox" role="switch" id="flexSwitchCheckDefault" wire:model="mode">
                                <label class="items-center form-check-label inline-flex text-portal-red mt-1" for="flexSwitchCheckDefault"> {{ $this->mode ? 'Parallel Mode' : 'Historical Mode'}}</label>
                            </div>
                        </btn>
                        <div class="relative">
                            <select wire:model="searchColumn"
                                    class="appearance-none h-full rounded-none border block appearance-none w-full py-2 px-4 pr-8 leading-tight">
                                @foreach($this->availableSearchColumns as $columns)
                                    <option> {{ $columns }}</option>
                                @endforeach
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
                        <input placeholder="Search for a Name..." wire:model="searchString"
                               type="text" class="rounded-none sm:rounded-l-none block pl-8 pr-6 py-2 w-full text-sm" />
                    </div>
                </div>
                <div>
                    <label for="datepicker">Start Date: </label>
                    <div class="inline-block datepicker relative" data-mdb-toggle-button="false">
                        <input type="text"
                               class="form-control w-full transition ease-in-out rounded-none"
                               placeholder="Select a start date" data-mdb-toggle="datepicker" wire:model="startDate"/>
                    </div>
                </div>
                <div>
                    <label for="datepicker">End Date: </label>
                    <div class="inline-block datepicker relative" data-mdb-toggle-button="false">
                        <input type="text"
                               class="form-control w-full transition ease-in-out rounded-none"
                               placeholder="Select a start date" data-mdb-toggle="datepicker" wire:model="endDate"/>
                    </div>
                </div>
                <div class="mx-2">
                    @foreach($this->availableLogTypes as $type)
                        <div>
                            <input type="checkbox" wire:model="logTypes" value="{{$type}}"/> <label>{{ $type }}</label>
                        </div>
                    @endforeach
                </div>
                <div>
                    <button type="submit" class="inline-block px-6 py-2.5 btn-portal font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out">
                        Search!
                    </button>
                </div>
            </form>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="min-w-full shadow rounded-lg overflow-hidden">
                    {{ $logs->links() }}
                    <table class="min-w-full leading-normal">
                        <thead class="container-portal">
                        <tr>
                            <th
                                class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                Logtype
                            </th>
                            <th
                                class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                Logentry
                            </th>
                            <th
                                class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                Time
                            </th>
                        </tr>
                        </thead>
                        <tbody class="container-portal">
                        @foreach($logs as $log)
                            <tr class="table-row-portal">
                                <td class="px-5 py-5 text-center text-sm">
                                    {!! $log->type !!}
                                </td>
                                <td class="px-5 py-5 text-center text-sm">
                                    {!! $log->loggable->toString() !!}
                                </td>
                                <td class="px-5 py-5 text-center text-sm">
                                    <a class="whitespace-no-wrap">{{ $log->created_at }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $logs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
