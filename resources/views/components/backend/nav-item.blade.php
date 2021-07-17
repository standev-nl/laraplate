@props(['active', 'dropdown'])

@php
    $classes = ($active ?? false)
                ? 'relative flex flex-row items-center h-11 focus:outline-none bg-gray-900 text-white border-l-4 border-transparent border-blue-500 pr-6 cursor-pointer rounded-md'
                : 'relative flex flex-row items-center h-11 focus:outline-none text-gray-400 hover:bg-gray-900 hover:text-white border-l-4 border-transparent hover:border-blue-500 rounded-md pr-6 transition duration-300 ease-in-out cursor-pointer';

    $dropdown = ($dropdown ?? false)
                ? '<div class="ml-auto transition-transform duration-200 transform" :class="{\'rotate-180\': open, \'rotate-0\': !open}"><i class="far fa-angle-down"></i></div>'
                : null;
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="inline-flex justify-center items-center ml-4">
        {{ $icon ?? "" }}
    </span>
    <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">
        {{ $slot }}
    </span>
    {!! $dropdown !!}
</a>
