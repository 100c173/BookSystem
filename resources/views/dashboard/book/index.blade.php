@extends('dashboard.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4 fw-bold text-primary-emphasis">📚 Book Table</h2>

    @include('dashboard.components.alert')

    <!-- Filter Form -->
    <div class="card shadow border-0 mb-4">
        <div class="card-body bg-light-subtle rounded">
        <form method="GET" class="row g-3 align-items-end mb-4">
    <div class="col-md-4">
        <label for="title" class="form-label">Search by Title</label>
        <input type="text" name="title" id="title" class="form-control"
               value="{{ request('title') }}">
    </div>

    <div class="col-md-3">
        <label for="publication_year" class="form-label">Filter by Year</label>
        <input type="number" name="publication_year" id="publication_year" class="form-control"
               value="{{ request('publication_year') }}">
    </div>

    <div class="col-md-3">
        <label for="category" class="form-label">Filter by Category</label>
        <select name="category" id="category" class="form-select">
            <option value="">-- All Categories --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-2 d-grid">
        <button type="submit" class="btn btn-primary">🔍 Filter</button>
    </div>
</form>

        </div>
    </div>

    <div class="card shadow border-0">
        <div class="card-body bg-light-subtle rounded">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center mb-0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Year</th>
                            <th>Cover</th>
                            <th>Copies</th>
                            <th style="width: 200px;">Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $index => $book)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="text-primary fw-semibold">{{ $book->author->name }}</td>
                            <td class="fw-medium">{{ $book->title }}</td>
                            <td class="text-muted">{{ Str::limit($book->description, 50) }}</td>
                            <td><span class="badge bg-info-subtle text-info">{{ $book->publication_year }}</span></td>
                            <td>
                                <img src="{{ asset('storage/'.$book->cover_image) }}" alt="Cover" class="img-thumbnail rounded shadow-sm" width="50">
                            </td>
                            <td><span class="badge bg-success-subtle text-success">{{ $book->available_copies }}</span></td>
                            <td>
                                <div class="d-flex flex-wrap justify-content-center gap-1">
                                    @foreach($book->categories as $category)
                                    <span class="badge bg-secondary text-truncate" style="max-width: 90px;">
                                        {{ $category->name }}
                                    </span>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-outline-primary" title="View">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $book->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">No books available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
            @include('dashboard.components.pagination', ['paginator' => $books->appends(request()->query())])
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="deleteForm">
            @csrf
            @method('DELETE')
            <div class="modal-content border border-danger-subtle">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">⚠ Confirm Deletion</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-dark">
                    Are you sure you want to delete this book? This action is irreversible.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    const deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const bookId = button.getAttribute('data-id');
        const form = document.getElementById('deleteForm');

        const actionTemplate = "{{ route('books.destroy', '__id__') }}";
        const action = actionTemplate.replace('__id__', bookId);

        form.setAttribute('action', action);
    });
</script>
@endpush

@endsection
