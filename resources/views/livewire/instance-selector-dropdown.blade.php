<div>
    @if($this->instances->count() > 1)
        <div class="dropdown relative">
            <a class="card-header-sg mr-4 dropdown-toggle hidden-arrow flex items-center" href="#" id="dropdownMenuButton1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Current Instance: {{ $this->own->name }}
            </a>
            <ul class="dropdown-menu min-w-max absolute hidden text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg
                                               mt-1 hidden m-0 bg-clip-padding border-none left-auto right-0 card-sg" aria-labelledby="dropdownMenuButton1">
                @foreach($this->instances as $instance)
                    @if($instance != $this->own)
                        <li>
                            <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent btn-sg" href="{{ $instance->url . request()->path() }}">
                                Switch to Instance: {{ $instance->name }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endif
</div>
