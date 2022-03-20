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
    <body>
        <div id="app" class="bg-arma3 bg-fixed bg-no-repeat bg-blend-darken bg-portal-gray/75 antialiased leading-none font-sans min-h-screen">
            <nav class="relative w-full flex flex-wrap items-center justify-between py-4 shadow-lg navbar navbar-expand-lg nav-portal">
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
                        <a class="flex items-center mt-2 lg:mt-0 mr-1 w-[45px] h-[45px]" href="{{ route('dashboard') }}">
                            <img src="{{ asset('images/sg.png') }}" alt="" loading="lazy" />
                        </a>
                        <!-- Left links -->
                        @auth()
                        <ul class="navbar-nav flex flex-col pl-0 list-style-none mr-auto">
                            <li class="nav-item p-2">
                                <a class="nav-item p-0 link link-underline" href="{{ route('territory.list') }}">
                                    Territories
                                </a>
                            </li>
                            <li class="nav-item p-2">
                                <a class="nav-link p-0 link link-underline" href="{{ route('clan.list') }}">Clans</a>
                            </li>
                        @endauth
                            <li class="nav-item p-2">
                                <a class="nav-link p-0 link link-underline" href="#">Dummy Menu 3</a>
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
            <div class="mb-10">
                @yield('content')
            </div>
            <footer class="container-portal lg:text-left fixed-bottom">
                <div class="p-4" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2022 Copyright:
                    <a class="link-underline" href="https://1ns.at">Insax</a>
                </div>
            </footer>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireScripts
        @livewire('livewire-ui-modal')
    </body>
</html>
