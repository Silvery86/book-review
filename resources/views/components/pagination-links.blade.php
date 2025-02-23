<div class="mt-4">
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-1 text-gray-400 bg-gray-200 rounded-lg cursor-not-allowed">
                    &larr; Prev
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-3 py-1 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    &larr; Prev
                </a>
            @endif

             {{-- Pagination Links --}}
             @foreach ($paginator->links()->elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="px-3 py-1 text-white bg-indigo-500 border border-indigo-500 rounded-lg">
                                {{ $page }}
                            </span>
                        @else
                        <a href="{{ $url . '&' . http_build_query(request()->except('page')) }}" class="px-3 py-1 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                            {{ $page }}
                        </a>
                        @endif
                    @endforeach
                @else
                    <span class="px-3 py-1 text-gray-700 bg-white border border-gray-300 rounded-lg">
                        {{ $element }}
                    </span>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-1 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    Next &rarr;
                </a>
            @else
                <span class="px-3 py-1 text-gray-400 bg-gray-200 rounded-lg cursor-not-allowed">
                    Next &rarr;
                </span>
            @endif
        </nav>
    @endif
</div>
