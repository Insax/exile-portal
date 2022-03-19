@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">

        <div class="w-full sm:px-6">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="pb-16">
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updateProfileInformation()))
                    @include('profile.update-profile-information-form')
                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    @include('profile.update-password-form')
                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))
                    @include('profile.two-factor-authentication-form')
                @endif
            </div>


        </div>
    </main>
@endsection
