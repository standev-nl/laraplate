<x-laraplate::.app-layout>
    <x-slot name="header">
        <h4 class="text-2xl font-bold leading-tight text-gray-800 dark:text-gray-300 ">Rol beheer</h4>
        {{ Diglactic\Breadcrumbs\Breadcrumbs::render('role.overview') }}
    </x-slot>

    <x-laraplate::.card>
        <livewire:backend.roles-table/>
    </x-laraplate::.card>
</x-laraplate::.app-layout>
