<div>
    <div class="container mx-auto px-4 sm:px-8 container-portal mt-10">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">User Overview/Management</h2>
            </div>
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="block relative">
                    <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current">
                            <path
                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                            </path>
                        </svg>
                    </span>
                    <input placeholder="Search for a Name..." wire:model="name"
                           type="text" class="rounded sm:rounded-l-none block pl-8 pr-6 py-2 w-full text-sm" />
                </div>
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
                                E-Mail
                            </th>
                            <th
                                class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                Role
                            </th>
                            <th
                                class="px-5 py-3 border-x-2 border-portal-gray/10 text-center text-xs font-semibold uppercase tracking-wider">
                                Actions
                            </th>

                        </tr>
                        </thead>
                        <tbody class="container-portal">
                        @foreach($this->users as $user)
                            <tr class="table-row-portal">
                                <td class="px-5 py-5 text-center text-sm">
                                    <p class="whitespace-no-wrap">{{ $user->id }}</p>
                                </td>
                                <td class="px-5 py-5 text-center text-sm">
                                    <p class="whitespace-no-wrap">{{ $user->name }}</p>
                                </td>
                                <td class="px-5 py-5 text-center text-sm">
                                    <p class="whitespace-no-wrap">{{ $user->email }}</p>
                                </td>
                                <td class="px-5 py-5 text-center text-sm">
                                    <p class="whitespace-no-wrap">{{ $user->getRoleNames()->first() }}</p>
                                </td>
                                <td class="px-5 py-5 text-center text-sm">
                                    <p class="whitespace-no-wrap">
                                        @if($user->getRoleNames()->first() != 'Super Admin')
                                            <button type="button"
                                                    class="inline-block px-6 py-2.5 btn-portal font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out"
                                                    wire:click='$emit("openModal", "edit-user", {{ json_encode(["user" => $user->id]) }})'>
                                                Edit
                                            </button>
                                            <button type="button"
                                                    class="inline-block px-6 py-2.5 btn-portal font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out"
                                                    wire:click='$emit("openModal", "delete-user", {{ json_encode(["user" => $user->id]) }})'>
                                                Delete
                                            </button>
                                        @else
                                            Can't change a Super Admin!
                                        @endif
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="flex flex-wrap">
                        <button type="button"
                                class="inline-block px-6 py-2.5 btn-portal font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out"
                                wire:click='$emit("openModal", "create-user")'>
                            {{ __('Create new User') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
