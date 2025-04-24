<nav>
  <ul class="pagination justify-content-end">

    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
      <li class="page-item disabled"><span class="page-link">Previous</span></li>
    @else
      <li class="page-item">
        <a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a>
      </li>
    @endif

    {{-- Pagination Elements --}}
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
      @if ($i == $paginator->currentPage())
        <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
      @else
        <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
      @endif
    @endfor

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
      <li class="page-item">
        <a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a>
      </li>
    @else
      <li class="page-item disabled"><span class="page-link">Next</span></li>
    @endif

  </ul>
</nav>
