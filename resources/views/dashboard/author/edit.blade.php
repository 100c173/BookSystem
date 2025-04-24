@extends('dashboard.layouts.app')

@section('title', 'Edit Author')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4 fw-bold text-warning">✏️ Edit Author</h2>


    <div class="card shadow border-0">
        <div class="card-body bg-light-subtle rounded">
            <form action="{{ route('authors.update', $author->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Name</label>
                        <input type="text" name="name" value="{{ old('name', $author->name) }}" class="form-control @error('name') is-invalid @enderror" >
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Birth Date</label>
                        <input type="date" name="birth_date"
                            value="{{ old('birth_date', $author->birth_date ? \Carbon\Carbon::parse($author->birth_date)->format('Y-m-d') : '') }}"
                            class="form-control @error('birth_date') is-invalid @enderror" >
                        @error('birth_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Bio</label>
                        <textarea name="bio" rows="4" class="form-control @error('bio') is-invalid @enderror" >{{ old('bio', $author->bio) }}</textarea>
                        @error('bio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning w-100 fw-bold">Update Author</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection