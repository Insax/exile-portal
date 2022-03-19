<div>
    <div class="container mx-auto px-4 sm:px-8 card-sg">
        <div class="py-8">
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="flex flex-row mb-1 sm:mb-0">
                    <div class="relative">
                        <select wire:model="items"
                                class="appearance-none h-full rounded-l border block appearance-none w-full py-2 px-4 pr-8 leading-tight">
                            @foreach($amounts as $key => $amount)
                                <option {{ $key != 'default' ? : 'selected="selected"' }}> {{ $amount }}</option>
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
                    <input placeholder="Search for a Name..." wire:model="name"
                           type="text" class="rounded-r rounded-l sm:rounded-l-none block pl-8 pr-6 py-2 w-full text-sm" />
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="min-w-full shadow rounded-lg overflow-hidden">
                    {{ $territoryContainerContent->links() }}
                    <table class="min-w-full leading-normal">
                        <thead>
                        <tr>
                            <th
                                class="card-header-sg px-5 py-3 border-b-2 text-left text-xs font-semibold uppercase tracking-wider">
                                Name
                            </th>
                            <th
                                class="card-header-sg px-5 py-3 border-b-2 text-left text-xs font-semibold uppercase tracking-wider">
                                Amount
                            </th>
                        </tr>
                        </thead>
                        <tbody class="card-sg">
                        @foreach($territoryContainerContent as $content)
                            <tr>
                                <td class="px-5 py-5 text-sm">
                                    <p class="whitespace-no-wrap">{{ $content->item }}</p>
                                </td>
                                <td class="px-5 py-5 text-sm">
                                    <p class="whitespace-no-wrap">{{ $content->count }}</p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $territoryContainerContent->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
