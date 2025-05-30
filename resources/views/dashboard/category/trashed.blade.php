@extends('dashboard.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4 fw-bold text-primary-emphasis">📁 Manage Categories</h2>

    @include('dashboard.components.alert')

    <div class="card shadow border-0">
        <div class="card-body bg-light-subtle rounded">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center mb-0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $index => $category)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold text-primary">{{ $category->name }}</td>
                            <td><span class="badge bg-success-subtle text-success">{{ $category->created_at->diffForHumans() }}</span></td>
                            <td><span class="badge bg-warning-subtle text-warning">{{ $category->updated_at->diffForHumans() }}</span></td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <form action="{{ route('categories.restore', $category->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-outline-success" title="Restore">
                                            <i class="fa fa-undo"></i>
                                        </button>
                                    </form>
                                   
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $category->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                   
                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No categories found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                @include('dashboard.components.pagination', ['paginator' => $categories])
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
                    Are you sure you want to delete this category? This action is irreversible.
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

        const actionTemplate = "{{ route('categories.forceDelete', '__id__') }}";
        const action = actionTemplate.replace('__id__', bookId);

        form.setAttribute('action', action);
    });
</script>
@endpush
@endsection