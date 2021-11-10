<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin') }}">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item nav-category">{{ __('Sell') }}</li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#catalog" aria-expanded="false" aria-controls="catalog">
            <i class="menu-icon mdi mdi-store"></i>
            <span class="menu-title">{{ __('Catalog') }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="catalog">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.products.index') }}">{{ __('Products') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.categories.index') }}">{{ __('Categories') }}</a></li>
            </ul>
        </div>
    </li>
  </ul>
</nav>