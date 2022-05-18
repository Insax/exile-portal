@php
    /** @var App\Models\Territory $territory */
@endphp
<div>
    <div class="container mx-auto px-4 sm:px-8 container-portal mt-10">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Log Overview</h2>
            </div>
                <div class="my-2 flex sm:flex-row flex-col items-center">
                    <div class="flex flex-row mb-1 sm:mb-0 items-center input-group">
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
                        <input placeholder="Please provide an ID/UID" wire:model="searchString"
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
            <div class="mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <ul class="nav nav-pills nav-justified flex flex-col md:flex-row flex-wrap list-none pl-0 mb-4"
                    id="pills-tabJustify" role="tablist">
                    @php
                        $first = true;
                    @endphp
                    @foreach($this->availableLogTypes as $type)
                        <li class="nav-item flex-grow text-center my-2 md:mr-2" role="presentation">
                            <a href="#{{$type}}"
                               class="nav-link w-full block font-medium text-xs leading-tight uppercase rounded px-6 py-3 focus:outline-none focus:ring-0 {{ $first ? 'active' : '' }}"
                               id="{{$type}}-tab" data-bs-toggle="pill" data-bs-target="#{{$type}}" role="tab"
                               aria-controls="{{$type}}"
                               aria-selected="{{ $first ? 'true' : 'false'  }}">{{$type}}</a>
                        </li>
                        @if($first)
                            {{ $first = false }}
                        @endif
                    @endforeach
                </ul>
                @php
                    $first = true;
                @endphp
                <div class="tab-content" id="types">
                    @foreach($this->availableLogTypes as $type)
                        <div
                            class="min-w-full shadow rounded-lg overflow-hidden tab-pane fade {{$first ? 'show active' : ''}}"
                            role="tabpanel" id="{{ $type }}"
                            aria-labelledby="{{$type}}-tab">
                            <table class="min-w-full leading-normal">
                                <thead class="container-portal">
                                <tr>
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
                                    @if($log->type != $type)
                                        @continue
                                    @endif
                                    <tr class="table-row-portal">
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
                        </div>
                        @if($first)
                            {{ $first = false }}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
