<x-laraplate::backend.app-layout>
    {{--    @TODO: Fix header options --}}
    <x-slot name="header">
        <h4 class="text-2xl font-bold leading-tight text-gray-800 dark:text-gray-300 ">{{ __('Dashboard') }}</h4>
{{--        {{ Diglactic\Breadcrumbs\Breadcrumbs::render('home') }}--}}
    </x-slot>
    {{--    <x-slot name="headerOptions">--}}
    {{--        <div class="mt-6 lg:mt-0">--}}
    {{--            <a href="{{ url()->previous() }}"--}}
    {{--               class="focus:outline-none mr-3 bg-transparent transition duration-150 ease-in-out hover:bg-gray-700 rounded text-white px-5 py-2 text-sm border border-white">--}}
    {{--                {{ __('Go back') }}</a>--}}
    {{--                        <button class="focus:outline-none transition duration-150 ease-in-out hover:bg-gray-200 border bg-gray-100 rounded text-indigo-700 px-8 py-2 text-sm">Edit Profile</button>--}}
    {{--        </div>--}}
    {{--    </x-slot>--}}

    <x-laraplate::backend.card>
        {{ __('You are logged in!') }} {{ auth()->user()->name }}<br>
    </x-laraplate::backend.card>

    <div class="flex gap-3 mt-8">
        <x-laraplate::backend.card>
            @displayDate(now())
        </x-laraplate::backend.card>
        <x-laraplate::backend.card>
            {{ now() }}
        </x-laraplate::backend.card>
        <x-laraplate::backend.card>
            {{ app()->getLocale() }}
        </x-laraplate::backend.card>
    </div>

</x-laraplate::backend.app-layout>
