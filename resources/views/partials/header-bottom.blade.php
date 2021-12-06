<div class="nav-section header-sticky">
    <div class="header-nav-section">
        <div class="container">
            <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" >
                <li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span class="nav-label hot-label">hot</span></li>
                <li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span class="nav-label hot-label">hot</span></li>
                <li class="menu-item"><a href="#" class="link-term">Top new items</a><span class="nav-label hot-label">hot</span></li>
                <li class="menu-item"><a href="#" class="link-term">Top Selling</a><span class="nav-label hot-label">hot</span></li>
                <li class="menu-item"><a href="#" class="link-term">Top rated items</a><span class="nav-label hot-label">hot</span></li>
            </ul>
        </div>
    </div>
    <div class="primary-nav-section">
        <div class="container">
            <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
                <li class="menu-item home-icon">
                    <a href="{{ route('home') }}" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('shop') }}" class="link-term mercado-item-title">Shop</a>
                </li>
                @foreach ($navCate as $category)
                    <li class="menu-item">
                        <a href="{{ route('category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
                <li class="menu-item">
                    <a href="{{ route('about-us') }}" class="link-term mercado-item-title">About Us</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('contact-us') }}" class="link-term mercado-item-title">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</div>