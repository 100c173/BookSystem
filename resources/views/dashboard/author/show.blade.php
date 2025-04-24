@extends('dashboard.layouts.app')

@section('title', 'Author Profile')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="row g-0">
            <div class="col-md-4 bg-primary-subtle d-flex align-items-center justify-content-center p-4">
                <div class="text-center">
                    <i class="fa fa-user-circle fa-7x text-primary mb-3"></i>
                    <h4 class="fw-bold text-primary">{{ $author->name }}</h4>
                    <p class="text-muted mb-1">Author Profile</p>
                </div>
            </div>

            <div class="col-md-8 bg-light-subtle">
                <div class="card-body p-4">
                    <h5 class="card-title text-dark fw-semibold mb-3">📄 Bio</h5>
                    <p class="card-text text-muted">{{ $author->bio ?? 'No biography provided.' }}</p>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-6">
                            <h6 class="fw-semibold text-secondary">📚 Books</h6>
                            <ul class="list-unstyled">
                                @forelse($author->books as $book)
                                    <li>
                                        <a href="{{ route('books.show', $book->id) }}" class="text-decoration-none text-primary">
                                            {{ $book->title }}
                                        </a>
                                    </li>
                                @empty
                                    <p class="text-muted">No books available.</p>
                                @endforelse
                            </ul>
                        </div>
                        <div class="col-6">
                            <h6 class="fw-semibold text-secondary">🎂 Birth Date</h6>
                            <p class="text-primary fs-5 fw-bold">    
                                {{ $author->birth_date ? \Carbon\Carbon::parse($author->birth_date)->format('F d, Y') : 'N/A' }}
                            </p>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-outline-warning me-2">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('authors.index') }}" class="btn btn-outline-secondary">
                            <i class="fa fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
