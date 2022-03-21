<div class="dropdown relative">
    <a class="card-header-portal mr-4 dropdown-toggle hidden-arrow flex items-center" href="#" id="dropdownMenuButton1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ Auth::user()->name }}
    </a>
    <ul class="dropdown-menu min-w-max absolute hidden text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg
                                               mt-1 hidden m-0 bg-clip-padding border-none left-auto right-0" aria-labelledby="dropdownMenuButton1">
        <li>
            <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap link-underline" href="{{ route('settings.home')}}">
                {{__('Account Settings')}}
            </a>
        </li>
        @can('Modify portal instances')
        <li>
            <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap link-underline" href="{{ route('portal.home')}}">
                {{__('portal.manage')}}
            </a>
        </li>
        @endcan
        @can('Create new User')
            <li>
                <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap link-underline" href="{{ route('users.manage')}}">
                    {{__('Manage Users')}}
                </a>
            </li>
        @endcan
        <li>
            <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap link-underline" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</div>
