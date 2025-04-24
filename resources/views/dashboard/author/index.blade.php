@extends('dashboard.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4 fw-bold text-primary-emphasis">🧑‍🏫 Author Table</h2>

    @include('dashboard.components.alert')

    <div class="card shadow border-0">
        <div class="card-body bg-light-subtle rounded">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center mb-0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>bio</th>
                            <th>Number Of Books</th>
                            <th>birth_date</th>
                            <th>Joined At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($authors as $index => $author)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="text-primary fw-semibold">{{ $author->name }}</td>
                            <td class="text-muted">{{ $author->bio }}</td>
                            <td>
                                <span class="badge bg-success-subtle text-success">
                                    {{ $author->books->count() }}
                                </span>
                            </td>
                            <td>
                               {{ $author->birth_date }}
                            </td>
                            <td>
                                <span class="badge bg-info-subtle text-info">
                                    {{ $author->created_at->format('Y-m-d') }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('authors.show', $author->id) }}" class="btn btn-sm btn-outline-primary" title="View">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $author->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No authors available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                @include('dashboard.components.pagination', ['paginator' => $authors])
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
                    Are you sure you want to delete this author? This action is irreversible.
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

        const actionTemplate = "{{ route('authors.destroy', '__id__') }}";
        const action = actionTemplate.replace('__id__', bookId);

        form.setAttribute('action', action);
    });
</script>
@endpush

@endsection
