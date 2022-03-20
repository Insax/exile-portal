<div>
    <form wire:submit.prevent="update">
        <div class="bg-portal-gray modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-clip-padding rounded-md outline-none text-current container-portal">
            <div
                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b card-header-portal rounded-t-md">
                <h5 class="text-xl font-medium leading-normal " id="addInput">
                    Edit User ID {{ $this->userId }}
                </h5>
                <button type="button"
                        class="text-portal-red btn-close box-content w-4 h-4 p-1 border-none rounded-none btn-portal"
                        wire:click="$emit('closeModal')" aria-label="Close"></button>
            </div>
            <div class="modal-body relative p-4 card-portal">
                <div class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8">
                    <div class="flex flex-wrap">
                        <label for="name" class="block text-sm font-bold mb-2 sm:mb-4">
                            Name
                        </label>

                        <input type="text" id="name"
                               class="form-input w-full @error('name') border-red-500 @enderror"
                               value="{{ old('name') }}" required autocomplete="name" autofocus wire:model.defer="name">

                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-sm font-bold mb-2 sm:mb-4">
                            E-Mail
                        </label>

                        <input id="email" type="email"
                               class="form-input w-full @error('url') border-red-500 @enderror"
                               required wire:model.defer="email">

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="flex flex-wrap">
                        <label for="role" class="block text-sm font-bold mb-2 sm:mb-4">
                            Role
                        </label>

                        <select id="role" class="form-input w-full" required wire:model.defer="role">
                            @foreach(\Spatie\Permission\Models\Role::whereNotIn('name', ['Super Admin'])->get() as $roles)
                                <option value="{{$roles->name}}" {{ $roles->name == 'Moderator' ? 'selected="selected"' : ''}}>{{$roles->name}}</option>
                            @endforeach
                        </select>

                        @error('role')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t rounded-b-md card-portal">
                <button type="button" wire:click="$emit('closeModal')" class="btn-portal inline-block px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn-portal inline-block px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out">Update</button>
            </div>
        </div>
    </form>
</div>
