@if ($notification = Session::get('success'))
    <div class="fixed z-50 w-full">
        <div class="flex items-center justify-center px-4">
            <div id="alert"
                 class="transition duration-150 ease-in-out w-full lg:w-6/12 mx-auto bg-white dark:bg-gray-800 shadow-2xl rounded flex flex-col py-4 md:py-0 items-center md:flex-row justify-between">
                <div class="flex flex-col items-center md:flex-row">
                    <div class="mr-3 p-4 bg-green-400 rounded md:rounded-tr-none md:rounded-br-none text-white">
                        <i class="far fa-check-circle"></i>
                    </div>
                    <p class="mr-2 text-base font-bold text-gray-800 dark:text-gray-100 mt-2 md:my-0">Gelukt</p>
                    <div class="h-1 w-1 bg-gray-300 dark:bg-gray-700 rounded-full mr-2 hidden xl:block"></div>
                    <p class="text-sm lg:text-base dark:text-gray-400 text-gray-600 lg:pt-1 xl:pt-0 sm:mb-0 mb-2 text-center sm:text-left">
                        {{ $notification['message'] }}
                    </p>
                </div>
                <div class="flex xl:items-center lg:items-center sm:justify-end justify-center pr-4">
                    @isset($notification['url'])
                        <a class="text-sm mr-4 font-bold cursor-pointer text-indigo-700 dark:text-indigo-600"
                           href="{{ $notification['url'] }}">Details</a>
                    @endisset
                    <span class="text-sm cursor-pointer text-gray-400 hover:text-gray-700"
                          onclick="closeAlert()"><i class="far fa-times"></i></span>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($notification = Session::get('error'))
    <div class="fixed z-50 w-full">
        <div class="flex items-center justify-center px-4">
            <div id="alert"
                 class="transition duration-150 ease-in-out w-full lg:w-6/12 mx-auto bg-white dark:bg-gray-800 shadow-2xl rounded flex flex-col py-4 md:py-0 items-center md:flex-row justify-between">
                <div class="flex flex-col items-center md:flex-row">
                    <div class="mr-3 p-4 bg-red-400 rounded md:rounded-tr-none md:rounded-br-none text-white">
                        <i class="far fa-times-circle"></i>
                    </div>
                    <p class="mr-2 text-base font-bold text-gray-800 dark:text-gray-100 mt-2 md:my-0">Oeps</p>
                    <div class="h-1 w-1 bg-gray-300 dark:bg-gray-700 rounded-full mr-2 hidden xl:block"></div>
                    <p class="text-sm lg:text-base dark:text-gray-400 text-gray-600 lg:pt-1 xl:pt-0 sm:mb-0 mb-2 text-center sm:text-left">
                        {{ $notification['message'] }}
                    </p>
                </div>
                <div class="flex xl:items-center lg:items-center sm:justify-end justify-center pr-4">
                    @isset($notification['url'])
                        <a class="text-sm mr-4 font-bold cursor-pointer text-indigo-700 dark:text-indigo-600"
                           href="{{ $notification['url'] }}">Details</a>
                    @endisset
                    <span class="text-sm cursor-pointer text-gray-400 hover:text-gray-700"
                          onclick="closeAlert()"><i class="far fa-times"></i></span>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($notification = Session::get('warning'))
    <div class="fixed z-50 w-full">
        <div class="flex items-center justify-center px-4">
            <div id="alert"
                 class="transition duration-150 ease-in-out w-full lg:w-6/12 mx-auto bg-white dark:bg-gray-800 shadow-2xl rounded flex flex-col py-4 md:py-0 items-center md:flex-row justify-between">
                <div class="flex flex-col items-center md:flex-row">
                    <div class="mr-3 p-4 bg-yellow-400 rounded md:rounded-tr-none md:rounded-br-none text-white">
                        <i class="far fa-exclamation-circle"></i>
                    </div>
                    <p class="mr-2 text-base font-bold text-gray-800 dark:text-gray-100 mt-2 md:my-0">Waarschuwing</p>
                    <div class="h-1 w-1 bg-gray-300 dark:bg-gray-700 rounded-full mr-2 hidden xl:block"></div>
                    <p class="text-sm lg:text-base dark:text-gray-400 text-gray-600 lg:pt-1 xl:pt-0 sm:mb-0 mb-2 text-center sm:text-left">
                        {{ $notification['message'] }}
                    </p>
                </div>
                <div class="flex xl:items-center lg:items-center sm:justify-end justify-center pr-4">
                    @isset($notification['url'])
                        <a class="text-sm mr-4 font-bold cursor-pointer text-indigo-700 dark:text-indigo-600"
                           href="{{ $notification['url'] }}">Details</a>
                    @endisset
                    <span class="text-sm cursor-pointer text-gray-400 hover:text-gray-700"
                          onclick="closeAlert()"><i class="far fa-times"></i></span>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($notification = Session::get('info'))
    <div class="fixed z-50 w-full">
        <div class="flex items-center justify-center px-4">
            <div id="alert"
                 class="transition duration-150 ease-in-out w-full lg:w-6/12 mx-auto bg-white dark:bg-gray-800 shadow-2xl rounded flex flex-col py-4 md:py-0 items-center md:flex-row justify-between">
                <div class="flex flex-col items-center md:flex-row">
                    <div class="mr-3 p-4 bg-blue-400 rounded md:rounded-tr-none md:rounded-br-none text-white">
                        <i class="far fa-exclamation-circle"></i>
                    </div>
                    <p class="mr-2 text-base font-bold text-gray-800 dark:text-gray-100 mt-2 md:my-0">Info</p>
                    <div class="h-1 w-1 bg-gray-300 dark:bg-gray-700 rounded-full mr-2 hidden xl:block"></div>
                    <p class="text-sm lg:text-base dark:text-gray-400 text-gray-600 lg:pt-1 xl:pt-0 sm:mb-0 mb-2 text-center sm:text-left">
                        {{ $notification['message'] }}
                    </p>
                </div>
                <div class="flex xl:items-center lg:items-center sm:justify-end justify-center pr-4">
                    @isset($notification['url'])
                        <a class="text-sm mr-4 font-bold cursor-pointer text-indigo-700 dark:text-indigo-600"
                           href="{{ $notification['url'] }}">Details</a>
                    @endisset
                    <span class="text-sm cursor-pointer text-gray-400 hover:text-gray-700"
                          onclick="closeAlert()"><i class="far fa-times"></i></span>
                </div>
            </div>
        </div>
    </div>
@endif

{{--@if ($errors->any())--}}

{{--    <div class="fixed z-50 w-full">--}}
{{--        <div class="flex items-center justify-center px-4">--}}
{{--            <div id="alert"--}}
{{--                 class="transition duration-150 ease-in-out w-full lg:w-6/12 mx-auto bg-white dark:bg-gray-800 shadow-2xl rounded flex flex-col py-4 md:py-0 items-center md:flex-row justify-between">--}}
{{--                <div class="flex flex-col items-center md:flex-row">--}}
{{--                    <div class="mr-3 p-4 bg-red-400 rounded md:rounded-tr-none md:rounded-br-none text-white">--}}
{{--                        <i class="far fa-exclamation-circle"></i>--}}
{{--                    </div>--}}
{{--                    <p class="mr-2 text-base font-bold text-gray-800 dark:text-gray-100 mt-2 md:my-0">Oh oh...</p>--}}
{{--                    <div class="h-1 w-1 bg-gray-300 dark:bg-gray-700 rounded-full mr-2 hidden xl:block"></div>--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <p class="text-sm lg:text-base dark:text-gray-400 text-gray-600 lg:pt-1 xl:pt-0 sm:mb-0 mb-2 text-center sm:text-left">--}}
{{--                            {{ $error }}--}}
{{--                        </p>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}
