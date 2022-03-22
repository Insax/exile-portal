<div>
    <form wire:submit.prevent="deleteOrRestore">
        <div class="bg-portal-gray modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-clip-padding rounded-md outline-none text-current container-portal">
            <div
                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b card-header-portal rounded-t-md">
                <h5 class="text-xl font-medium leading-normal " id="addInput">
                    @if($this->needsPayment)
                        Restore Territory
                    @else
                        Delete Territory
                    @endif
                </h5>
                <button type="button"
                        class="text-portal-red btn-close box-content w-4 h-4 p-1 border-none rounded-none btn-portal"
                        wire:click="$emit('closeModal')" aria-label="Close"></button>
            </div>
            <div class="modal-body relative p-4 card-portal">
                <div class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8">
                    @if($this->needsPayment)
                        <div class="flex flex-wrap">
                            <label for="advancePayment" class="block text-sm font-bold mb-2 sm:mb-4">

                            </label>

                            <input type="number" id="advancePayment"
                                   class="form-input w-full @error('advancePayment') border-red-500 @enderror"
                                   value="{{ old('advancePayment') }}" required autocomplete="advancePayment" autofocus wire:model="advancePayment">

                            @error('advancePayment')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    @endif

                    <div class="flex flex-wrap">
                        <label for="reason" class="block text-sm font-bold mb-2 sm:mb-4">
                            Reason:
                        </label>

                        <input id="reason" type="text"
                               class="form-input w-full @error('reason') border-red-500 @enderror"
                               required wire:model="reason">

                        @error('reason')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t rounded-b-md card-portal">
                <button type="button" wire:click="$emit('closeModal')" class="btn-portal inline-block px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn-portal inline-block px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out">Modify Territory</button>
            </div>
        </div>
    </form>
</div>
