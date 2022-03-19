@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('status') }}.</span>
        </div>
    @endif

    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words card-sg sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold card-header-sg py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Login') }}
                </header>

                <form class="w-full card-sg px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="name" class="block text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Name') }}:
                        </label>

                        <input id="name" type="text"
                            class="form-input w-full @error('name') border-red-500 @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password" class="block text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Password') }}:
                        </label>

                        <input id="password" type="password"
                            class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                            required>

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <label class="inline-flex items-center text-sm" for="remember">
                            <input type="checkbox" name="remember" id="remember" class="form-checkbox h-5 w-5 bg-sg-gray checked:bg-sg-gray text-sg-red"
                                {{ old('remember') ? 'checked' : '' }}>
                            <span class="ml-2">{{ __('Remember Me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                        <a class="text-sm text-sg-red hover:text-blue-700 whitespace-no-wrap underline hover:underline ml-auto"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                        class="mb-6 w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline btn-sg sm:py-4">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
