<nav aria-label="Page navigation">
    <ul class="pagination">
        <!-- Previous Page Link -->
        @if ($users->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">&laquo;</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
                    &laquo;
                </a>
            </li>
        @endif

        <!-- Page Links -->
        @php
            $current = $users->currentPage();
            $total = $users->lastPage();

            // Show three links around the current page
            $start = max($current - 1, 1);
            $end = min($current + 1, $total);

            // Adjust the start and end for edge cases
            if ($current - 1 < 1) {
                $start = 1;
                $end = min(3, $total);
            } elseif ($current + 1 > $total) {
                $start = max($total - 2, 1);
                $end = $total;
            }
        @endphp

        @if ($start > 1)
            <li class="page-item">
                <a class="page-link" href="{{ $users->url(1) }}">1</a>
            </li>
            @if ($start > 2)
                <li class="page-item disabled">
                    <span class="page-link">...</span>
                </li>
            @endif
        @endif

        @for ($i = $start; $i <= $end; $i++)
            <li class="page-item {{ $i == $current ? 'active' : '' }}">
                <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($end < $total)
            @if ($end < $total - 1)
                <li class="page-item disabled">
                    <span class="page-link">...</span>
                </li>
            @endif
            <li class="page-item">
                <a class="page-link" href="{{ $users->url($total) }}">{{ $total }}</a>
            </li>
        @endif

        <!-- Next Page Link -->
        @if ($users->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
                    &raquo;
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">&raquo;</span>
            </li>
        @endif
    </ul>
</nav>