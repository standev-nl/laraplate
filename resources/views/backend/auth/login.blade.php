<x-laraplate::backend.auth-layout>
    <x-laraplate::auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-laraplate::backend.logo-white class="w-36 h-36 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-laraplate::auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
{{--        <x-laraplate::auth-validation-errors class="mb-4" :errors="$errors"/>--}}

        <form method="POST" action="{{ route('backend.login') }}">
        @csrf

        <!-- Email Address -->
            <div>
                <x-laraplate::label for="email" :value="__('Email')"/>

                <x-laraplate::input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required=""
                         autofocus/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-laraplate::label for="password" :value="__('Password')"/>

                <x-laraplate::input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required="" autocomplete="current-password"/>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                           name="remember">
                    <span class="ml-2 text-sm text-gray-800 dark:text-gray-300">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('backend.password.request'))
                    <a class="underline text-sm text-gray-800 dark:text-gray-300 hover:text-gray-900"
                       href="{{ route('backend.password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-laraplate::button class="ml-3">
                    {{ __('Log in') }}
                </x-laraplate::button>
            </div>
        </form>

    </x-laraplate::auth-card>
</x-laraplate::backend.auth-layout>
