<section class="flex flex-col break-words sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg mt-4">

    <header class="font-semibold card-header-portal py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
        Change password
    </header>

    <div class="w-full p-6">
        <form method="POST" action="{{ route('user-password.update') }}" class="w-full px-6 py-2 space-y-6 sm:px-10 sm:space-y-8 card-portal">
            @csrf
            @method('PUT')

            <div class="flex flex-wrap">
                <label for="current_password" class="block text-sm font-bold mb-2 sm:mb-4">
                    {{ __('Current Password') }}
                </label>

                <input id="current_password"
                    class="form-input w-full @error('email') border-red-500 @enderror" type="password" name="current_password" required autocomplete="current-password">

                @error('current_password')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap">
                <label for="password" class="block font-bold mb-2 sm:mb-4">
                    {{ __('Password') }}
                </label>

                <input id="password"
                    class="form-input w-full @error('email') border-red-500 @enderror" type="password" name="password" required autocomplete="new-password">

                @error('password')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap">
                <label for="password_confirmation" class="block font-bold mb-2 sm:mb-4">
                    {{ __('Confirm Password') }}
                </label>

                <input id="password_confirmation"
                    class="form-input w-full @error('email') border-red-500 @enderror" type="password" name="password_confirmation" required autocomplete="new-password">

                @error('password_confirmation')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap">
                <button type="submit"
                class="inline-flex items-center px-4 py-2 btn-portal rounded-md font-semibold text-xs uppercase tracking-widest transition ease-in-out duration-150">
                    {{ __('Save') }}
                </button>
            </div>

        </form>

</div>
</section>
