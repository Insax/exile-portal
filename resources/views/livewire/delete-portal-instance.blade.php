<div>
    <form wire:submit.prevent="delete">
        <div class="bg-portal-gray modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-clip-padding rounded-md outline-none text-current container-portal">
            <div
                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b card-header-portal rounded-t-md">
                <h5 class="text-xl font-medium leading-normal " id="addInput">
                    Delete Portal Instance {{ $this->instanceId }}
                </h5>
                <button type="button"
                        class="text-portal-red btn-close box-content w-4 h-4 p-1 border-none rounded-none btn-portal"
                        wire:click="$emit('closeModal')" aria-label="Close"></button>
            </div>
            <div class="modal-body relative p-4 card-portal">
                <p class="text-lg">Are you sure you want to delete this instance? This can't be undone!</p>
            </div>
            <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t rounded-b-md card-portal">
                <button type="button" wire:click="$emit('closeModal')" class="btn-portal inline-block px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn-portal inline-block px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out">Yes</button>
            </div>
        </div>
    </form>
</div>
