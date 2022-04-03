<div>
    <form wire:submit.prevent="store">
        <div class="bg-portal-gray modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-clip-padding rounded-md outline-none text-current container-portal">
            <div
                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b card-header-portal rounded-t-md">
                <h5 class="text-xl font-medium leading-normal " id="addInput">
                    Create new Role
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
                               value="{{ old('name') }}" required autocomplete="name" autofocus wire:model="name">

                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div>
                        @foreach($this->permissions as $permission)
                            <label class="items-center text-sm block" for="{{$permission->name}}">
                                <input type="checkbox" name="remember" id="remember" class="form-checkbox h-5 w-5 bg-portal-gray checked:bg-portal-gray text-portal-red" wire:model="selectedPermissions.{{$permission->id}}"
                                <span class="ml-2">{{ __($permission->name) }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t rounded-b-md card-portal">
                <button type="button" wire:click="$emit('closeModal')" class="btn-portal inline-block px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn-portal inline-block px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out">Create</button>
            </div>
        </div>
    </form>
</div>
