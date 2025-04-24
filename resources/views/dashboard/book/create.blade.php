@extends('dashboard.layouts.app')

@section('title', 'Dashboard')



@section('content')
@include('dashboard.components.alert')

<div class="container">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white fs-4 fw-bold">
            <i class="bi bi-plus-circle me-2"></i> Add New Book
        </div>
        <div class="card-body">

            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Author -->
                <div class="mb-3">
                    <label for="author_id" class="form-label">Author</label>
                    <select class="form-select" id="author_id" name="author_id" required>
                        <option disabled selected>Select an author</option>
                        @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>

                <!-- Publication Year -->
                <div class="mb-3">
                    <label for="publication_year" class="form-label">Publication Year</label>
                    <input type="number" class="form-control" id="publication_year" name="publication_year" required>
                </div>

                <!-- Cover Image -->
                <div class="mb-3">
                    <label for="cover_image" class="form-label">Cover Image</label>
                    <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
                </div>

                <!-- Available Copies -->
                <div class="mb-3">
                    <label for="available_copies" class="form-label">Available Copies</label>
                    <input type="number" class="form-control" id="available_copies" name="available_copies" required>
                </div>

                <!-- Book File -->
                <div class="mb-3">
                    <label for="path_file" class="form-label">Book File (PDF)</label>
                    <input type="file" class="form-control" id="path_file" name="path_file" accept="application/pdf">
                </div>

                <!-- Categories Dropdown with Checkboxes -->
                <div class="mb-3">
                    <label class="form-label">Categories</label>
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle w-100 text-start" type="button" id="dropdownCategories" data-bs-toggle="dropdown" aria-expanded="false">
                            Select Categories
                        </button>
                        <ul class="dropdown-menu w-100 px-3" style="max-height: 250px; overflow-y: auto;" aria-labelledby="dropdownCategories">
                            @foreach ($categories as $category)
                            <li class="form-check">
                                <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" id="category_{{ $category->id }}">
                                <label class="form-check-label" for="category_{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Submit -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-4 py-2 rounded-3">
                        <i class="bi bi-save me-1"></i> Save Book
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection