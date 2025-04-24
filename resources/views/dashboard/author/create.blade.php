@extends('dashboard.layouts.app')

@section('title', 'Create Author')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4 fw-bold text-success">➕ Add New Author</h2>

   

    <div class="card shadow border-0">
        <div class="card-body bg-light-subtle rounded">
            <form action="{{ route('authors.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" >
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Birth Date</label>
                        <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="form-control @error('birth_date') is-invalid @enderror" >
                        @error('birth_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Bio</label>
                        <textarea name="bio" rows="4" class="form-control @error('bio') is-invalid @enderror" >{{ old('bio') }}</textarea>
                        @error('bio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success w-100 fw-bold">Save Author</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
