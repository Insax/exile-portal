<div>
    <!-- Modal -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto card-sg"
         id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="wire:ignore.self modal-dialog relative w-auto pointer-events-none card-sg">
            <form wire:submit.prevent="store">
                <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-clip-padding rounded-md outline-none text-current card-sg">
                    <div
                        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b card-header-sg rounded-t-md">
                        <h5 class="text-xl font-medium leading-normal " id="addInput">
                            Modal title
                        </h5>
                        <button type="button"
                                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body relative p-4 card-sg">
                        <div class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8">
                            <div class="flex flex-wrap">
                                <label for="name" class="block text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Instance Name') }}:
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
                                <label for="url" class="block text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Instance Url') }}:
                                </label>

                                <input id="url" type="text"
                                       class="form-input w-full @error('url') border-red-500 @enderror"
                                       required wire:model.defer="url">

                                @error('url')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t rounded-b-md card-sg">
                        <button type="button" class="btn-sg inline-block px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-sg inline-block px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <section class="w-full flex flex-col break-words card-sg sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg mt-4">

        <header class="font-semibold card-header-sg py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
            Current Portals
        </header>

        <div class="w-full p-6 items-center">
            <div class="w-full px-6 py-2 space-y-6 sm:px-10 sm:space-y-8">
                @foreach($this->portalInstances as $instance)
                    <div class="flex items-center items-stretch w-full">
                            <div class="flex flex-wrap items-stretch w-full mb-4 relative">
                                <div class="flex -mr-px">
                                    <span class="card-header-sg flex items-center leading-normal rounded rounded-r-none border border-r-0 px-3 whitespace-no-wrap text-sm"> {{ $instance->name }}</span>
                                </div>
                                <input value="{{ $instance->url }}" type="text" disabled class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 rounded rounded-l-none px-3 relative" >
                                <div class="flex -mr-px">
                                    <span class="card-header-sg flex items-center leading-normal rounded rounded-r-none border border-r-0 px-3 whitespace-no-wrap text-sm"> {{ $instance->name }}</span>
                                </div>
                            </div>
                    </div>
                @endforeach

                <div class="flex flex-wrap">
                    <button type="button"
                            class="inline-block px-6 py-2.5 btn-sg font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        {{ __('portal.create') }}
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>
