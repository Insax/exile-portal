@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
        <div class="flex">
            <div class="w-full">
                <section class="flex flex-col break-words card-portal sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                    <header class="font-semibold card-header-portal py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                        {{ __('2 Factor Authentication') }}
                    </header>

                    <form class="w-full card-portal px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ url('/two-factor-challenge') }}">
                        @csrf

                        <div class="flex flex-wrap">
                            <label for="code" class="block text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.')  }}
                            </label>

                            <input id="code" type="text"
                                   class="form-input w-full @error('code') border-red-500 @enderror" name="code"
                                   required autocomplete="name" autofocus>

                            @error('code')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>


                        <div class="flex flex-wrap">
                            <button type="submit"
                                    class="mb-6 w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline btn-portal sm:py-4">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>

                </section>
            </div>
        </div>
    </main>
@endsection
