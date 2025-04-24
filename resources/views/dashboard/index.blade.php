@extends('dashboard.layouts.app')

@section('title', 'Dashboard')


@section('content')
<h2 class="mb-4 fw-bold">📊 Welcome to your Dashboard</h2>
@include('dashboard.components.alert')

<div class="row g-4">
  <div class="col-md-4">
    @component('dashboard.components.stat-card', ['bg' => 'bg-blue', 'icon' => 'bi-book', 'label' => 'Books', 'value' => $books ]) @endcomponent
  </div>
  <div class="col-md-4">
    @component('dashboard.components.stat-card', ['bg' => 'bg-purple', 'icon' => 'bi-tags', 'label' => 'Categories', 'value' => $categories ]) @endcomponent
  </div>
  <div class="col-md-4">
    @component('dashboard.components.stat-card', ['bg' => 'bg-green', 'icon' => 'bi-people-fill', 'label' => 'Users', 'value' => $authors ]) @endcomponent
  </div>
</div>

<div class="row mt-5">
  <div class="col-md-6">
    @include('dashboard.partials.latest-books')
  </div>
  <div class="col-md-6">
    @include('dashboard.partials.tasks')
  </div>
</div>
@endsection
