<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @livewireStyles

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="bg-arma3 antialiased leading-none font-sans backdrop-blur-xl bg-fixed bg-no-repeat">
        <div id="app">
            <nav class="relative w-full flex flex-wrap items-center justify-between py-4 shadow-lg navbar navbar-expand-lg card-sg">
                <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
                    <button
                        class="navbar-toggler text-gray-500 border-0 hover:shadow-none hover:no-underline py-2 px-2.5 bg-transparent focus:outline-none focus:ring-0 focus:shadow-none focus:no-underline"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                    </button>
                    <div class="collapse navbar-collapse flex-grow items-center" id="navbarSupportedContent">
                        <a class="flex items-center mt-2 lg:mt-0 mr-1" href="{{ route('dashboard') }}">
                            <img src="{{ asset('images/sg.png') }}" style="height: 15px" alt="" loading="lazy" />
                        </a>
                        <!-- Left links -->
                        <ul class="navbar-nav flex flex-col pl-0 list-style-none mr-auto">
                            <li class="nav-item p-2">
                                <a class="nav-link p-0" href="{{ route('territory.list') }}">Territories</a>
                            </li>
                            <li class="nav-item p-2">
                                <a class="nav-link p-0" href="{{ route('clan.list') }}">Clans</a>
                            </li>
                            <li class="nav-item p-2">
                                <a class="nav-link p-0" href="#">Dummy Menu 3</a>
                            </li>
                        </ul>
                        <!-- Left links -->
                    </div>
                    <!-- Collapsible wrapper -->

                    <!-- Right elements -->
                    <div class="flex items-center relative">
                        <!-- Icon -->
                        @guest
                            <ul class="navbar-nav flex flex-col pl-0 list-style-none mr-auto">
                                <li class="nav-item p-2">
                                    <a class="nav-link hover:underline mr-4" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            </ul>
                        @else
                            <ul class="navbar-nav flex flex-col pl-0 list-style-none mr-auto">
                                <li class="nav-item p-2">
                                    @livewire('player-search')
                                </li>
                            </ul>
                            @livewire('instance-selector-dropdown')
                            @livewire('user-dropdown')
                        @endguest
                    </div>
                    <!-- Right elements -->
                </div>
            </nav>
            @yield('content')

        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireScripts
    </body>
</html>
