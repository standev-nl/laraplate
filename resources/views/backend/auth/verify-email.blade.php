<x-laraplate::backend.auth-layout>
    <x-laraplate::auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-laraplate::backend.logo-color class="w-36 h-36 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('backend.verification.send') }}">
                @csrf

                <div>
                    <x-laraplate::button>
                        {{ __('Resend Verification Email') }}
                    </x-laraplate::button>
                </div>
            </form>

            <form method="POST" action="{{ route('backend.logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log out') }}
                </button>
            </form>
        </div>
    </x-laraplate::auth-card>
</x-laraplate::backend.auth-layout>
