<x-laraplate::.app-layout>
    <x-slot name="header">
        <h4 class="text-2xl font-bold leading-tight text-gray-800 dark:text-gray-300 ">Gebruikers</h4>
        {{ Diglactic\Breadcrumbs\Breadcrumbs::render('users.index') }}
    </x-slot>

    <x-slot name="headerOptions">
        <div class="mt-6 lg:mt-0">
            <a class="bg-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 rounded text-white px-8 py-2 text-sm focus:outline-none"
               href="{{ route('backend.users.create') }}">Gebruiker toevoegen</a>
        </div>
    </x-slot>

    <x-laraplate::.card>
        {{--        <livewire:datatable model="StanDev\Laraplate\Models\User" :dates="['created_at|d-m-Y H:i:s', 'created_at']" searchable="name" hideable="select" exportable/>--}}
        <livewire:backend.users-table/>
    </x-laraplate::.card>


</x-laraplate::.app-layout>
