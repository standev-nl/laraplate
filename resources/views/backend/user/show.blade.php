<x-laraplate::.app-layout>
    <x-slot name="header">
        <h4 class="text-2xl font-bold leading-tight text-gray-800 dark:text-gray-300 ">{{ $user->name }}</h4>
        {{ Diglactic\Breadcrumbs\Breadcrumbs::render('users.show', $user) }}
    </x-slot>

{{--    <x-slot name="headerOptions">--}}
{{--        <div class="mt-6 lg:mt-0">--}}
{{--            <a class="focus:outline-none transition duration-150 ease-in-out hover:bg-gray-200 border bg-gray-100 rounded-md text-indigo-700 px-8 py-2 text-sm"--}}
{{--               href="{{ route('backend.users.show', $user) }}">Gebruiker bekijken</a>--}}
{{--        </div>--}}
{{--    </x-slot>--}}

    <x-laraplate::.card>

    </x-laraplate::.card>


</x-laraplate::.app-layout>
