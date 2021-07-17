<x-frontend.app-layout>

    <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
        <h1 class="my-4 text-3xl md:text-5xl text-blue-600 font-bold leading-tight text-center md:text-left slide-in-bottom-h1">
            Welkom!
        </h1>
        <div class="border-l-4 border-blue-300">
            <p class="leading-normal text-base text-2xl text-gray-700 slide-in-bottom-subtitle ml-3">
                {{ \Illuminate\Foundation\Inspiring::quote() }}
            </p>
        </div>
    </div>

    <div class="w-full xl:w-3/5 py-6 overflow-y-hidden">
        <img class="w-5/6 mx-auto lg:mr-0 slide-in-bottom" src="https://tailwindtoolbox.github.io/App-Landing-Page/devices.svg" alt="devices">
    </div>

</x-frontend.app-layout>
