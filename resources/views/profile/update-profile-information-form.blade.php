<section class="flex flex-col break-words sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

    <header class="font-semibold card-header-portal py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
        Update Profile information
    </header>

    <div class="w-full p-6 card-portal">
        <form method="POST" action="{{ route('user-profile-information.update') }}" class="w-full px-6 py-2 space-y-6 sm:px-10 sm:space-y-8">
            @csrf
            @method('PUT')

            <div class="flex flex-wrap">
                <label for="Name" class="block text-sm font-bold mb-2 sm:mb-4">
                    {{ __('Name') }}
                </label>

                <input id="name" type="text"
                    class="form-input w-full @error('email') border-red-500 @enderror" ntype="text" name="name" value="{{ old('name') ?? auth()->user()->name }}" required autofocus autocomplete="name">

                @error('name')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>


            <div class="flex flex-wrap">
                <label for="email" class="block text-sm font-bold mb-2 sm:mb-4">
                    {{ __('Email') }}
                </label>

                <input id="email" type="email"
                    class="form-input w-full @error('email') border-red-500 @enderror" type="email" name="email" value="{{ old('email') ?? auth()->user()->email }}" required autofocus>

                @error('name')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap">
                <button type="submit"
                class="inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs text-white uppercase tracking-widest btn-portal transition ease-in-out duration-150">
                {{ __('Update Profile') }}
                </button>
            </div>

        </form>
    </div>
</section>

