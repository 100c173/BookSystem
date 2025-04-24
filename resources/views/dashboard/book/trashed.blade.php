@extends('dashboard.layouts.app')

@section('title', 'Dashboard')


@section('content')
<h2 class="mb-4 fw-bold">Book Tabel</h2>
@include('dashboard.components.alert')

<!-- Main Content -->

<div class="card bg-white p-4">

    <!-- Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Title</th>
                <th>Description</th>
                <th>Publication Year</th>
                <th>Cover Image</th>
                <th>Available Copies</th>
                <th style="width: 200px;">Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $index => $book)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $book->author->name }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->description }}</td>
                <td>{{ $book->publication_year }}</td>
                <td>
                    <img src="{{ asset('storage/'.$book->cover_image) }}" alt="Cover Image" class="img-thumbnail" width="50">
                </td>
                <td>{{ $book->available_copies }}</td>

               
                <td>
                    <div class="d-flex flex-wrap gap-1">
                        @foreach($book->categories as $category)
                        <span class="badge bg-secondary text-truncate" style="max-width: 90px;">
                            {{ $category->name }}
                        </span>
                        @endforeach
                    </div>
                </td>

                <td>

                    <form method="POST" action="{{ route('books.restore', $book->id) }}" style="display: inline-block;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-link text-success p-0" title="Restore Book">
                            <i class="fa fa-trash-restore"></i>
                        </button>
                    </form>

                    <button type="button" class="btn btn-link text-danger p-0" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $book->id }}">
                        <i class="fa fa-trash"></i>
                    </button>

                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    @include('dashboard.components.pagination', ['paginator' => $books])
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="deleteForm">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this book?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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

        // Laravel route مع placeholder سيتم استبداله
        const actionTemplate = "{{ route('books.forceDelete', '__id__') }}";
        const action = actionTemplate.replace('__id__', bookId);

        form.setAttribute('action', action);
    });
</script>
@endpush


@endsection