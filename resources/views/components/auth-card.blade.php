<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <div>
        {{ $logo }}
    </div>

    <div class="pt-8 px-2 flex flex-col items-center justify-center">
        <h3 class="text-2xl sm:text-3xl xl:text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">{{ __('Login') }}</h3>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-700 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>

    <div class="mt-6 px-6 py-4 text-gray-800 dark:text-gray-200">
        <a href="">{{ __('Go back to') }} <strong>{{ config('app.name') }}</strong></a>
    </div>
</div>
