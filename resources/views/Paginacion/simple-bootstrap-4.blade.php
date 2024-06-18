@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-start">
            {{-- Enlace a la página anterior --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link"><i class="fas fa-angle-double-left fa-lg"></i></span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <i class="fas fa-angle-double-left fa-lg"></i>
                    </a>
                </li>
            @endif

            {{-- Enlaces de números de página --}}
            @foreach ($elements as $element)

                {{-- Separador de "tres puntos" --}}
                @if (is_string($element))
                    <li class="page-item disabled">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Conjunto de enlaces --}}
                @if (is_array($element))
                    @php
                        $start = max($paginator->currentPage() - 1, 1);
                        $end = min($paginator->currentPage() + 1, $paginator->lastPage());
                    @endphp

                    @for ($page = $start; $page <= $end; $page++)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item" style="background-color: #007bff;">
                                <span class="page-link" style="color: #ffffff;">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $paginator->url($page) }}" style="color: #000000;">{{ $page }}</a>
                            </li>
                        @endif
                    @endfor
                @endif
            @endforeach

            {{-- Enlace a la página siguiente --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <i class="fas fa-angle-double-right fa-lg"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link"><i class="fas fa-angle-double-right fa-lg"></i></span>
                </li>
            @endif
        </ul>
    </nav>
@endif