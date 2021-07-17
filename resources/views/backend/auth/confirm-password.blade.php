<x-laraplate::backend.auth-layout>
    <x-laraplate::auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-laraplate::backend.logo-color class="w-36 h-36 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-laraplate::auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('backend.password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-laraplate::label for="password" :value="__('Password')" />

                <x-laraplate::input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-laraplate::button>
                    {{ __('Confirm') }}
                </x-laraplate::button>
            </div>
        </form>
    </x-laraplate::auth-card>
</x-laraplate::backend.auth-layout>
