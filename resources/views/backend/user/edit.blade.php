<x-laraplate::.app-layout>
    <x-slot name="header">
        <h4 class="text-2xl font-bold leading-tight text-gray-800 dark:text-gray-300 ">{{ $user->firstname }} {{ $user->lastname }}</h4>
        {{ Diglactic\Breadcrumbs\Breadcrumbs::render('users.edit', $user) }}
    </x-slot>

    <style>
        .checkbox:checked + .check-icon {
            display: flex;
        }
    </style>

    <div class="container mx-auto my-auto bg-white shadow rounded">
        <div class="xl:w-full border-b border-gray-300 dark:border-gray-700 py-5">
            <div class="flex items-center w-11/12 mx-auto">
                <p class="text-lg text-gray-800 dark:text-gray-100 font-bold">Algemene informatie</p>
            </div>
        </div>

        <x-laraplate::-form action="{{ route('backend.users.update', $user) }}">
            @method('PUT')

            <div class="w-11/12 mx-auto">
                <div class="container mx-auto">
                    <div class="my-8 mx-auto xl:w-full xl:mx-0">


                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 divide-gray-50">

                            <div class="col-span-1">
                                <h2 class="text-md font-medium">Algemene informatie</h2>
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-300">
                                    Vul hier de algemene profielgegevens in.
                                </p>
                            </div>
                            <div class="col-span-1 lg:col-span-2 space-y-6">
                                <div class="grid gap-4">

                                    <div class="grid grid-cols-2 gap-4">
                                        <x-laraplate::-form-input name="firstname" label="Voornaam" type="text"
                                                              value="{{ $user->firstname }}"/>
                                        <x-laraplate::-form-input name="lastname" label="Achternaam" type="text"
                                                              value="{{ $user->lastname }}"/>
                                    </div>
                                    <x-laraplate::-form-input name="email" label="E-mailadres" type="email"
                                                          value="{{ $user->email }}" required/>
                                    <div class="grid grid-cols-3 gap-4">
                                        <x-laraplate::-form-select name="locale" label="Standaard taal"
                                                               :options="config()->get('language')"
                                                               :default="[$user->locale]"/>
                                        <x-laraplate::-form-select name="timezone" label="Tijdzone"
                                                               :options="timezone_identifiers_list()"
                                                               :default="[$user->timezone]"/>
                                        <x-laraplate::-form-select name="role" label="Rol"
                                                               :options="\Spatie\Permission\Models\Role::pluck('name', 'id')"
                                                               :default="$user->roles->first()->id"/>
                                    </div>
                                    @if($user->can_be_impersonated)
                                        <x-laraplate::-form-checkbox name="can_be_impersonated" label="Inloggen als" checked/>
                                    @else
                                        <x-laraplate::-form-checkbox name="can_be_impersonated" label="Inloggen als"/>
                                    @endif
                                    @if($user->active)
                                        <x-laraplate::-form-checkbox name="active" label="Account actief" checked/>
                                    @else
                                        <x-laraplate::-form-checkbox name="active" label="Account actief"/>
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="w-full py-4 sm:px-12 px-4 bg-gray-100 dark:bg-gray-700 mt-6 flex justify-end rounded-bl rounded-br">
                <x-laraplate::-form-submit/>
            </div>

        </x-laraplate::-form>
    </div>


</x-laraplate::.app-layout>
