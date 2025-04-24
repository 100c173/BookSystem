<div class="custom-card">
  <h5 class="fw-bold mb-3">📚 Latest Added Books</h5>
  <ul class="list-group list-group-flush">
    @foreach($recentBooks as $book)
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <a href="{{ route('books.show', $book->id) }}" class="btn btn-link text-decoration-none p-0">
        {{ $book->title }}
      </a>
      <span class="badge bg-primary">{{ $book->created_at->diffForHumans() }}</span>
    </li>
    @endforeach

  </ul>
</div>