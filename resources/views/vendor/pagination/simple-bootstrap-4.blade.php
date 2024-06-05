@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-start">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link"><i class="fas fa-angle-double-left fa-lg"></i></span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fas fa-angle-double-left fa-lg"></i></a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fas fa-angle-double-right fa-lg"></i></a></li>
            @else
                <li class="page-item disabled"><span class="page-link"><i class="fas fa-angle-double-right fa-lg"></i></span></li>
            @endif
        </ul>
    </nav>
@endif
