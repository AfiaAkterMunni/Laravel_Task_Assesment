@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-start">
            @if ($paginator->onFirstPage())
                <li class="page-item rounded-2 bg-secondary me-3 disabled">
                    <a class="page-link" href="#">
                        <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.36308 10L12 17.7781L9.81846 20L0 10L9.81846 0L12 2.22187L4.36308 10Z" fill="black"/>
                        </svg>
                    </a>
                </li>
            @else
                <li class="page-item rounded-2 bg-secondary me-3">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                        <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.36308 10L12 17.7781L9.81846 20L0 10L9.81846 0L12 2.22187L4.36308 10Z" fill="black"/>
                        </svg>
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled me-3 rounded-2">{{ $element }}</li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active me-3 rounded-2">
                                <a class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item me-3 rounded-2">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item rounded-2 bg-secondary me-3">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.63693 10L1.74111e-06 2.22187L2.18154 -2.47948e-07L12 10L2.18154 20L3.81143e-07 17.7781L7.63693 10Z" fill="black"/>
                        </svg>
                    </a>
                </li>
            @else
                <li class="page-item rounded-2 bg-secondary me-3 disabled">
                    <a class="page-link" href="#">
                        <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.63693 10L1.74111e-06 2.22187L2.18154 -2.47948e-07L12 10L2.18154 20L3.81143e-07 17.7781L7.63693 10Z" fill="black"/>
                        </svg>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif

