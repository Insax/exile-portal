@extends('layouts.app')

@section('content')
<main class="container container-portal sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg p-6">

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="password" class="block text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Password') }}
                        </label>

                        <input
                            class="form-input w-full @error('password') border-red-500 @enderror"
                            value="{{ old('password') }}" type="password" name="password" required autocomplete="current-password">

                        @if ($errors->any())
                            <div>
                                <div>{{ __('Whoops! Something went wrong.') }}</div>

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-red-500 text-xs italic mt-4">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center">
                        <button type="submit"
                        class="btn-portal inline-block px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out">
                        {{ __('Confirm Password') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm whitespace-no-wrap ml-auto">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>

                </form>

            </section>
        </div>
    </div>
</main>

@endsection
