@extends('dashboard.layouts.app')

@section('title', 'Add Category')

@section('content')
<div class="container-fluid">
  <h2 class="mb-4 fw-bold text-primary-emphasis">➕ Add New Category</h2>

  @include('dashboard.components.alert')

  <div class="card shadow border-0">
    <div class="card-body bg-light-subtle rounded">
      <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <!-- Name -->
        <div class="mb-3">
          <label for="name" class="form-label fw-semibold text-dark">Category Name <span class="text-danger">*</span></label>
          <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                 value="{{ old('name') }}" placeholder="e.g. Technology, Literature, Science..." required>
          @error('name')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <!-- Description -->
        <div class="mb-4">
          <label for="description" class="form-label fw-semibold text-dark">Description</label>
          <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                    rows="4" placeholder="Brief description about the category...">{{ old('description') }}</textarea>
          @error('description')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <!-- Submit Button -->
        <div class="d-flex justify-content-between">
          <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
            <i class="fa fa-arrow-left me-1"></i> Back to Categories
          </a>
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-check-circle me-1"></i> Save Category
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
