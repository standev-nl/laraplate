@unless ($breadcrumbs->isEmpty())

    <p class="flex items-center text-xs text-gray-800 dark:text-gray-300">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <a href="{{ $breadcrumb->url }}" class="font-extrabold">{!! $breadcrumb->title !!}</a>
            @else
                <span class="font-light">{!! $breadcrumb->title !!}</span>
            @endif
            @unless($loop->last)
                <span class="mx-2"><i class="far fa-angle-right"></i></span>
            @endif
        @endforeach
    </p>

@endunless
