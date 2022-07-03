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
      <a class="nav-link" data-bs-toggle="collapse" href="#orders" aria-expanded="false" aria-controls="orders">
        <i class="menu-icon mdi mdi-basket"></i>
        <span class="menu-title">{{ __('Orders') }}</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="orders">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.orders.index') }}">{{ __('Orders') }}</a></li>
          {{-- <li class="nav-item"><a class="nav-link" href="{{ route('admin.categories.index') }}">{{ __('Categories') }}</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.specific-price.index') }}">{{ __('Specific price') }}</a></li> --}}
        </ul>
      </div>
    </li>
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
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.brands.index') }}">{{ __('Brands') }}</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.specific-price.index') }}">{{ __('Specific price') }}</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#customer" aria-expanded="false" aria-controls="customer">
        <i class="menu-icon mdi mdi-account-circle"></i>
        <span class="menu-title">{{ __('Customer') }}</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="customer">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.user.index') }}">{{ __('Users') }}</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.address.index') }}">{{ __('Addresses') }}</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item nav-category">{{ __('Improvement') }}</li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#designing" aria-expanded="false" aria-controls="internationl">
        <i class="menu-icon mdi mdi-monitor-edit"></i>
        <span class="menu-title">{{ __('Designing') }}</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="designing">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.banner.index') }}">{{ __('Banner') }}</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#internationl" aria-expanded="false" aria-controls="internationl">
        <i class="menu-icon mdi mdi-web"></i>
        <span class="menu-title">{{ __('Internationl') }}</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="internationl">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.localization.index') }}">{{ __('Localization') }}</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.language.index') }}">{{ __('Language') }}</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.currency.index') }}">{{ __('Currency') }}</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ action('\Barryvdh\TranslationManager\Controller@getIndex') }}">{{ __('Translations') }}</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>