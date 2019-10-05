@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}


        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous') </a></li>
        @endif
        &nbsp&nbsp
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))

                @foreach ($element as $page => $url)
                    @if ($loop->index < 4)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @elseif($loop->index == 3)
                            <li><a href="{{ $url }}">...</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endif
                @endforeach
            @endif
        @endforeach
        &nbsp&nbsp
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
        @else
            <li class="disabled" aria-disabled="true"><span>@lang('pagination.next')</span></li>
        @endif
    </ul>
@endif
