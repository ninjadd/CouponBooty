@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li><a href="#topGrid"  aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-left"></i></span></a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}#topGrid" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-left"></i></span></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><a href="#topGrid">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><a href="#topGrid" class="active">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}#topGrid">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}#topGrid" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a></li>
        @else
            <li><a href="#topGrid" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a></li>
        @endif
    </ul>
@endif