<x-laraplate::backend.layouts.auth-layout>
    <x-laraplate::auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-laraplate::backend.logo-color class="w-36 h-36 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-laraplate::auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('backend.password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('backend.token') }}">

            <!-- Email Address -->
            <div>
                <x-laraplate::label for="email" :value="__('Email')" />

                <x-laraplate::input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-laraplate::label for="password" :value="__('Password')" />

                <x-laraplate::input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-laraplate::label for="password_confirmation" :value="__('Confirm Password')" />

                <x-laraplate::input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-laraplate::auth-card>
</x-laraplate::backend.layouts.auth-layout>
