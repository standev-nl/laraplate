<div class="bg-gray-800 dark:bg-gray-900 flex-col justify-between hidden lg:flex min-h-screen">
    <div class="px-8">
        <div class="flex items-center justify-center pt-6">
            <a href="#">
                <x-laraplate::backend.logo-white class="block h-24 w-56 fill-current"/>
            </a>
        </div>

        <div class="mt-12">
            <div class="flex flex-row items-center h-8">
                <span class="flex font-semibold text-sm text-white dark:text-gray-200 my-4 font-sans uppercase">Dashboard</span>
            </div>
            <x-laraplate::backend.nav-item :href="route('backend.dashboard')" :active="request()->routeIs('backend.dashboard')">
                <x-slot name="icon">
                    <i class="far fa-home-alt"></i>
                </x-slot>
                <x-slot name="slot">
                    Home
                </x-slot>
            </x-laraplate::backend.nav-item>
        </div>

        <div class="mt-4">
            <div class="flex flex-row items-center h-8">
                <span
                    class="flex font-semibold text-sm text-white dark:text-gray-200 my-4 font-sans uppercase">Systeem</span>
            </div>
            <x-laraplate::backend.nav-item-dropdown>
                <x-slot name="trigger">
                    <x-laraplate::backend.nav-item :dropdown="1">
                        <x-slot name="icon">
                            <i class="far fa-users"></i>
                        </x-slot>
                        <x-slot name="slot">
                            Toegang
                        </x-slot>
                    </x-laraplate::backend.nav-item>
                </x-slot>
                <x-slot name="content">

                    @can('access users')
                        <x-laraplate::backend.nav-item :active="request()->routeIs('backend.users.index')"
                                            :href="route('backend.users.index')">
                            <x-slot name="icon">
                                <i class="fas fa-circle" style="font-size: 0.4rem"></i>
                            </x-slot>
                            <x-slot name="slot">
                                Gebruikers
                            </x-slot>
                        </x-laraplate::backend.nav-item>
                    @endcan

                    @can('access roles')
                        <x-laraplate::backend.nav-item :active="request()->routeIs('backend.role.overview')"
                                            :href="route('backend.role.overview')">
                            <x-slot name="icon">
                                <i class="fas fa-circle" style="font-size: 0.4rem"></i>
                            </x-slot>
                            <x-slot name="slot">
                                Rollen
                            </x-slot>
                        </x-laraplate::backend.nav-item>
                    @endcan

                </x-slot>
            </x-laraplate::backend.nav-item-dropdown>

        </div>

    </div>

</div>

<!--Mobile responsive sidebar-->
<div class="absolute z-40 w-full h-full lg:hidden transform -translate-x-full" id="mobile-nav">
    <div class="bg-gray-800 opacity-60 w-full h-full absolute" onclick="sidebarHandler(false)"></div>
    <div
        class="w-64 md:w-96 z-20 absolute bg-gray-800 shadow h-full flex-col justify-between pb4 transition duration-150 ease-in-out">
        <div class="h-full w-full flex flex-col justify-between">
            <div>
                <div class="text-white flex items-center justify-between px-8">
                    <div class="h-16 mt-6 w-full flex items-center">
                        <x-laraplate::backend.logo-white class="block h-24 w-48 fill-current"/>
                    </div>
                    <div onclick="sidebarHandler(false)">
                        <svg id="cross" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x"
                             width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>
                            <line x1="18" y1="6" x2="6" y2="18"/>
                            <line x1="6" y1="6" x2="18" y2="18"/>
                        </svg>
                    </div>
                </div>

                <div class="px-8">

                    <div class="mt-12">
                        <div class="flex flex-row items-center h-8">
                            <span class="flex font-semibold text-sm text-white dark:text-gray-200 my-4 font-sans uppercase">Dashboard</span>
                        </div>
                        <x-laraplate::backend.nav-item :href="route('backend.dashboard')" :active="request()->routeIs('backend.dashboard')">
                            <x-slot name="icon">
                                <i class="far fa-home-alt"></i>
                            </x-slot>
                            <x-slot name="slot">
                                Home
                            </x-slot>
                        </x-laraplate::backend.nav-item>
                    </div>

                    <div class="mt-4">
                        <div class="flex flex-row items-center h-8">
                <span
                    class="flex font-semibold text-sm text-white dark:text-gray-200 my-4 font-sans uppercase">Systeem</span>
                        </div>
                        <x-laraplate::backend.nav-item-dropdown>
                            <x-slot name="trigger">
                                <x-laraplate::backend.nav-item :dropdown="1">
                                    <x-slot name="icon">
                                        <i class="far fa-users"></i>
                                    </x-slot>
                                    <x-slot name="slot">
                                        Toegang
                                    </x-slot>
                                </x-laraplate::backend.nav-item>
                            </x-slot>
                            <x-slot name="content">

                                @can('access users')
                                    <x-laraplate::backend.nav-item :active="request()->routeIs('backend.users.index')"
                                                        :href="route('backend.users.index')">
                                        <x-slot name="icon">
                                            <i class="fas fa-circle" style="font-size: 0.4rem"></i>
                                        </x-slot>
                                        <x-slot name="slot">
                                            Gebruikers
                                        </x-slot>
                                    </x-laraplate::backend.nav-item>
                                @endcan

                                @can('access roles')
                                    <x-laraplate::backend.nav-item :active="request()->routeIs('backend.role.overview')"
                                                        :href="route('backend.role.overview')">
                                        <x-slot name="icon">
                                            <i class="fas fa-circle" style="font-size: 0.4rem"></i>
                                        </x-slot>
                                        <x-slot name="slot">
                                            Rollen
                                        </x-slot>
                                    </x-laraplate::backend.nav-item>
                                @endcan

                            </x-slot>
                        </x-laraplate::backend.nav-item-dropdown>

                    </div>

                </div>
            </div>
            <div>
                <div class="w-full">
                    <div class="border-t border-gray-700">
                        <div class="w-full flex items-center justify-between px-6 pt-3 pb-3">
                            <div class="flex items-center">
                                <img class="rounded-full h-10 w-10 object-cover"
                                     src="https://ui-avatars.com/api/?name={{ auth()->user()->firstname }}&color=7F9CF5&background=EBF4FF"
                                     alt="avatar"/>
                                <p class="md:text-xl text-white text-base leading-4 ml-2">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
