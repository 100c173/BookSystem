<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Modern Bright Dashboard')</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/dashboard-widgets.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/toggleSidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/read-book.css') }}">

  <script src="{{ asset('js/dashboard-tasks.js') }}"></script>
  <script src="{{ asset('js/sidebar.js') }}"></script>
  <script src="{{ asset('js/toggleSidebar.js') }}"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>


<!-- Navbar -->
<nav class="navbar navbar-dark px-4">
  <a class="navbar-brand" href="#"><i class="bi bi-lightning-charge-fill me-2"></i>BookSystem</a>
  <div class="ms-auto">
    <button class="btn btn-outline-light btn-sm">Logout</button>
  </div>
</nav>

<!-- Sidebar -->
<div class="sidebar">
  @include('dashboard.partials.sidebar')
</div>

<!-- Main Content -->
<div class="main-content">
  @yield('content')
  @stack('scripts')

</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
