@extends('dashboard.layouts.app')

@section('title', 'Dashboard')


@section('content')
<div class="container-fluid px-4 py-5 main-content" style="min-height: 100vh; background: #f9fafb;">
  <div class="row g-4 align-items-center justify-content-center">

    <!-- Book Cover Section -->
    <div class="col-lg-5">
      <div class="rounded-4 shadow-lg overflow-hidden bg-white">
        <img src="{{ asset('storage/' . $book->cover_image) }}" class="img-fluid w-100" style="object-fit: cover; height: 500px;" alt="Book Cover">
      </div>
    </div>

    <!-- Book Info Section -->
    <div class="col-lg-7">
      <div class="bg-white shadow-lg rounded-4 p-5">
        <h1 class="display-5 fw-bold text-dark mb-3">{{ $book->title }}</h1>
        <p class="fs-5 text-muted mb-4" style="line-height: 1.7;">{{ $book->description }}</p>

        <div class="d-flex gap-3 flex-wrap mb-4">
          <a href="{{ asset('storage/' . $book->path_file) }}" target="_blank" class="btn btn-dark btn-lg px-4 py-2">
            <i class="bi bi-file-earmark-pdf me-2"></i> Download PDF
          </a>
          <button class="btn btn-outline-primary btn-lg px-4 py-2" data-bs-toggle="collapse" data-bs-target="#pdfReader">
            <i class="bi bi-book me-2"></i> Read Online
          </button>
        </div>

        <!-- Embedded Reader -->
        <div class="collapse" id="pdfReader">
          <div class="ratio ratio-16x9 rounded-3 overflow-hidden shadow-sm">
            <iframe src="{{ asset('storage/' . $book->path_file) }}" frameborder="0" class="w-100 h-100" allowfullscreen></iframe>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

@endsection