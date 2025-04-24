@extends('dashboard.layouts.app')

@section('title', 'Category Details')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">
        <i class="fa fa-folder-open text-primary me-2"></i> Category Details
    </h2>

    <div class="card shadow-sm border-0">
        <div class="card-body bg-light-subtle p-4 rounded-3">

            <h4 class="text-dark fw-semibold mb-3">
                <i class="fa fa-align-left text-info me-2"></i> Description
            </h4>

            @if ($category->description)
                <p class="fs-5 text-secondary">
                    {{ $category->description }}
                </p>
            @else
                <p class="text-muted fst-italic">No description provided for this category.</p>
            @endif

        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
            <i class="fa fa-arrow-left me-1"></i> Back to List
        </a>
    </div>

</div>
@endsection
