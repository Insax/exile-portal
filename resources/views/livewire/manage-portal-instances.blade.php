<div>
    <div class="container mx-auto px-4 sm:px-8 container-portal mt-10">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Portal Overview/Management</h2>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="min-w-full shadow rounded-lg overflow-hidden">
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
                                Url
                            </th>
                            <th
                                class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                Active
                            </th>
                            <th
                                class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                Actions
                            </th>

                        </tr>
                        </thead>
                        <tbody class="container-portal">
                        @foreach($this->portalInstances as $instance)
                            <tr class="table-row-portal">
                                <td class="px-5 py-5 text-center text-sm">
                                    <p class="whitespace-no-wrap">{{ $instance->id }}</p>
                                </td>
                                <td class="px-5 py-5 text-center text-sm">
                                    <p class="whitespace-no-wrap">{{ $instance->name }}</p>
                                </td>
                                <td class="px-5 py-5 text-center text-sm">
                                    <p class="whitespace-no-wrap">{{ $instance->url }}</p>
                                </td>
                                <td class="px-5 py-5 text-center text-sm">
                                    <p class="whitespace-no-wrap">{{ $instance->active }}</p>
                                </td>
                                <td class="px-5 py-5 text-center text-sm">
                                    <p class="whitespace-no-wrap">
                                        <button type="button"
                                                class="inline-block px-6 py-2.5 btn-portal font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out"
                                                wire:click='$emit("openModal", "edit-portal-instance", {{ json_encode(["instance" => $instance->id]) }})'>
                                            Edit
                                        </button>
                                        <button type="button"
                                                class="inline-block px-6 py-2.5 btn-portal font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out"
                                                wire:click='$emit("openModal", "delete-portal-instance", {{ json_encode(["instance" => $instance->id]) }})'>
                                            Delete
                                        </button>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="flex flex-wrap">
                        <button type="button"
                                class="inline-block px-6 py-2.5 btn-portal font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out"
                                wire:click='$emit("openModal", "create-portal-instance")'>
                            {{ __('Create new Instance') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
