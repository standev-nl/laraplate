@props(['color' => 'primary', 'href'])

@php
    switch($color){
        case 'primary':
            $class = 'inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150';
            break;
        case 'secondary':
            $class = 'inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-white active:white focus:outline-none focus:border-white focus:ring ring-white disabled:opacity-25 transition ease-in-out duration-150';
            break;
    }
@endphp

<a {{ $attributes->merge(['class' => $class]) }}
   href="{{ $href }}">
    {{ $slot }}
</a>
