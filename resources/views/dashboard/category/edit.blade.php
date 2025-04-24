@extends('dashboard.layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="container-fluid">
  <h2 class="mb-4 fw-bold text-primary-emphasis">✏️ Edit Category</h2>


  <div class="card shadow border-0">
    <div class="card-body bg-light-subtle rounded">
      <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-3">
          <label for="name" class="form-label fw-semibold text-dark">Category Name <span class="text-danger">*</span></label>
          <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                 value="{{ old('name', $category->name) }}" >
          @error('name')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <!-- Description -->
        <div class="mb-4">
          <label for="description" class="form-label fw-semibold text-dark">Description</label>
          <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                    rows="4">{{ old('description', $category->description) }}</textarea>
          @error('description')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <!-- Submit Button -->
        <div class="d-flex justify-content-between">
          <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
            <i class="fa fa-arrow-left me-1"></i> Back to Categories
          </a>
          <button type="submit" class="btn btn-success">
            <i class="fa fa-save me-1"></i> Update Category
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
