<ul class="nav flex-column px-2 py-3" id="sidebarMenu">

  <!-- Dashboard -->
  <li class="nav-item mb-1">
    <a class="nav-link d-flex align-items-center" href="/">
      <i class="bi bi-speedometer2 me-2 fs-5 text-primary"></i> Dashboard
    </a>
  </li>

  <!-- Entities Section -->
  <div class="section-title">Entities</div>

  <li class="nav-item">
    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#entityMenu" role="button" aria-expanded="false" aria-controls="entityMenu" id="entityToggle">
      <span><i class="bi bi-collection me-2 text-success"></i> Manage</span>
      <i class="bi bi-chevron-down small text-muted" id="entityIcon"></i>
    </a>
    <div class="collapse submenu" id="entityMenu">
      <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link sub-item" href="{{route('books.index')}}"><i class="bi bi-book me-2 text-info"></i>Books</a></li>
        <li class="nav-item"><a class="nav-link sub-item" href="{{route('categories.index')}}"><i class="bi bi-tags me-2 text-warning"></i>Categories</a></li>
        <li class="nav-item"><a class="nav-link sub-item" href="{{route('authors.index')}}"><i class="bi bi-person-lines-fill me-2 text-danger"></i>Authors</a></li>
      </ul>
    </div>
  </li>

  <!-- Settings Section -->
  <div class="section-title">Settings</div>

  <li class="nav-item">
    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#settingsMenu" role="button" aria-expanded="false" aria-controls="settingsMenu" id="settingsToggle">
      <span><i class="bi bi-gear me-2 text-secondary"></i> System</span>
      <i class="bi bi-chevron-down small text-muted" id="settingsIcon"></i>
    </a>
    <div class="collapse submenu" id="settingsMenu">
      <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link sub-item" href="{{route('books.create')}}"><i class="bi bi-book-plus me-2 text-primary"></i>Add Book</a></li>
        <li class="nav-item"><a class="nav-link sub-item" href="{{route('categories.create')}}"><i class="bi bi-plus-square me-2 text-success"></i>Add Category</a></li>
        <li class="nav-item"><a class="nav-link sub-item" href="{{route('authors.create')}}"><i class="bi bi-person-plus me-2 text-warning"></i>Add Author</a></li>
      </ul>
    </div>
  </li>

  <!-- Profile -->
  <li class="nav-item mt-3">
    <a class="nav-link d-flex align-items-center" href="#">
      <i class="bi bi-person-circle me-2 text-dark"></i> Profile
    </a>
  </li>

  <!-- Trashed Section -->
  <div class="section-title">Trashed</div>

  <li class="nav-item">
    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#trashedMenu" role="button" aria-expanded="false" aria-controls="trashedMenu" id="trashedToggle">
      <span><i class="bi bi-trash3 me-2 text-danger"></i> Deleted</span>
      <i class="bi bi-chevron-down small text-muted" id="trashedIcon"></i>
    </a>
    <div class="collapse submenu" id="trashedMenu">
      <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link sub-item" href="{{route('books.trashed')}}"><i class="bi bi-book me-2 text-info"></i>Books</a></li>
        <li class="nav-item"><a class="nav-link sub-item" href="{{route('categories.trashed')}}"><i class="bi bi-tags me-2 text-warning"></i>Categories</a></li>
      </ul>
    </div>
  </li>

</ul>