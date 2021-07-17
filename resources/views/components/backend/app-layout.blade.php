<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- @TODO: Fix includes and other commented stuff below --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- FA -->
    <script src="https://kit.fontawesome.com/7d479db69b.js" crossorigin="anonymous"></script>

    @livewireStyles

</head>

<body class="font-sans antialiased bg-gray-200 dark:bg-gray-800">

<div class="flex h-full">
    <!-- Sidebar starts -->
    {{--    @include('backend.partials.flash-message')--}}
    @include('laraplate::backend.partials.sidenav')

    <div class="w-full">
        <!-- Navigation starts -->
        <nav
                class="h-16 flex items-center lg:items-stretch justify-end lg:justify-between shadow bg-white dark:bg-gray-900 relative z-10 border-b border-gray-300 dark:border-gray-700">
            <div class="hidden lg:flex w-full pr-6">
                <div class="w-1/2 h-full hidden lg:flex items-center pl-6 pr-24">
                    <div class="relative w-full"></div>
                </div>
                <div class="w-1/2 hidden lg:flex">
                    <div class="w-full flex items-center pl-8 justify-end">

                        <div
                                class="h-full flex items-center justify-center border-r mr-2 ml-2 border-gray-200 dark:border-gray-800">
{{--                            <x-laraplate::dropdown align="right" width="48">--}}
{{--                                <x-slot name="trigger">--}}
{{--                                    <button--}}
{{--                                            class="flex items-center text-sm font-medium mr-5 text-gray-900 dark:text-gray-200 focus:outline-none focus:text-gray-900 dark:focus:text-gray-200 transition duration-150 ease-in-out">--}}
{{--                                        {{ config()->get('language')[app()->getLocale()] }}--}}
{{--                                        <div class="ml-2">--}}
{{--                                            <i class="far fa-angle-down"></i>--}}
{{--                                        </div>--}}
{{--                                    </button>--}}
{{--                                </x-slot>--}}
{{--                                <x-slot name="content">--}}
{{--                                    @foreach (config()->get('language') as $lang => $language)--}}
{{--                                        <x-laraplate::dropdown-link :href="route('lang.switch', $lang)">--}}
{{--                                            {{ $language }}--}}
{{--                                        </x-laraplate::dropdown-link>--}}
{{--                                    @endforeach--}}
{{--                                </x-slot>--}}
{{--                            </x-laraplate::dropdown>--}}
                        </div>

                        <div
                                class="h-full flex items-center justify-center mr-2 ml-2 border-gray-200 dark:border-gray-800">
                            <x-laraplate::dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                            class="flex items-center text-sm font-medium mr-5 text-gray-900 dark:text-gray-200 focus:outline-none focus:text-gray-900 dark:focus:text-gray-200 transition duration-150 ease-in-out">
                                        <div class="relative">
                                            <img class="rounded-full h-10 w-10 object-cover"
                                                 src="https://ui-avatars.com/api/?name={{ auth()->user()->firstname }}&color=7F9CF5&background=EBF4FF"
                                                 alt="avatar"/>
                                            <div
                                                    class="w-2 h-2 rounded-full bg-green-400 border border-white absolute inset-0 mb-0 mr-0 m-auto"></div>
                                        </div>
                                        <div class="ml-4">
                                            {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                                        </div>
                                        <div class="ml-2">
                                            <i class="far fa-angle-down"></i>
                                        </div>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <form method="POST" action="{{ route('backend.logout') }}">
                                        @csrf
                                        {{--@TODO: Dropdown link fixen (button)--}}
                                        <x-laraplate::dropdown-link :href="route('backend.logout')"
                                                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            <i class="far fa-sign-out text-red-400 mr-1"></i> {{ __('Logout') }}
                                        </x-laraplate::dropdown-link>
                                    </form>
                                </x-slot>
                            </x-laraplate::dropdown>
                        </div>

                    </div>
                </div>
            </div>
            <div class="text-gray-800 dark:text-gray-200 mr-8 visible lg:hidden relative" onclick="sidebarHandler(true)"
                 id="menu">
                <i class="far fa-bars"></i>
            </div>
        </nav>

        <div class="pt-8 pb-8">
            <div class="container px-6 mx-auto flex flex-col lg:flex-row items-start lg:items-center justify-between">
                <div>
                    {{ $header }}
                </div>
                {{ $headerOptions ?? null }}
            </div>
        </div>

        <div class="container px-6 mb-5 mx-auto">
            {{ $slot }}
        </div>

    </div>
</div>

@livewireScripts
<script>
    let sideBar = document.getElementById("mobile-nav");
    let menu = document.getElementById("menu");
    let cross = document.getElementById("cross");
    const sidebarHandler = (check) => {
        if (check) {
            sideBar.style.transform = "translateX(0px)";
            menu.classList.add("hidden");
            cross.classList.remove("hidden");
        } else {
            sideBar.style.transform = "translateX(-100%)";
            menu.classList.remove("hidden");
            cross.classList.add("hidden");
        }
    };

    function dropdownHandler(element) {
        let single = element.getElementsByTagName("ul")[0];
        single.classList.toggle("hidden");
    }

    let Alert = document.getElementById("alert");
    Alert.style.visibility = "hidden";
    Alert.style.transform = "translateY(-200%)";
    setTimeout(function () {
        Alert.style.visibility = "visible";
        Alert.style.transform = "translateY(50%)";

    }, 1000);

    function closeAlert() {
        Alert.style.transform = "translateY(-200%)";
    }

</script>
@stack('scripts')

</body>
</html>
