<div class="dropdown relative">
    <form>
        <input autocomplete="off" class="card-header-sg mr-4 dropdown-toggle hidden-arrow flex items-center" id="search" type="text" aria-expanded="false" placeholder="Steam64/Name" wire:model="search"/>
        <button class="absolute right-0 top-0 mt-3 mr-2" disabled>
            <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
            </svg>
        </button>
    </form>
    @if($this->accounts != null && $this->accounts->count() && $this->search)
        <ul wire:loading.remove class="dropdown-menu min-w-max absolute text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 m-0 bg-clip-padding border-none left-auto right-0 card-sg" aria-labelledby="dropdownMenuButton1">
            @foreach($this->accounts as $account)
            <li>
                <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent btn-sg" href="{{ route('account.view', $account->uid) }}">
                    {{ $account->uid }} | {{ $account->name }}
                </a>
            </li>
            @endforeach
        </ul>
    @endif
    <ul wire:loading.delay  class="dropdown-menu min-w-max absolute text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 m-0 bg-clip-padding border-none left-auto right-0 card-sg" aria-labelledby="dropdownMenuButton1">
        <li>
            <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent btn-sg disabled" href="test">
                Loading...
            </a>
        </li>
    </ul>
</div>
