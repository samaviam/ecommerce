<header id="header" class="header header-style-1">
    <div class="container-fluid">
        <div class="row">
            @include('partials.header-top')

            <div class="container">
                <div class="mid-section main-info-area">
                    <div class="wrap-logo-top left-section">
                        <a href="{{ route('home') }}" class="link-to-home"><img src="{{ asset('images/logo-top-1.png') }}" alt="mercado"></a>
                    </div>
                    <div class="wrap-search center-section">
                        @include('partials.search')
                    </div>
                    <div class="wrap-icon right-section">
                        <div class="wrap-icon-section wishlist">
                            <a href="{{ route('wishlist.index') }}" class="link-direction">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">0 item</span>
                                    <span class="title">Wishlist</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section minicart">
                            <a href="{{ route('cart.index') }}" class="link-direction">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index"><span>{{ Cart::getTotalQuantity() }}</span> items</span>
                                    <span class="title">CART</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section show-up-after-1024">
                            <a href="#" class="mobile-navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @include('partials.header-bottom')
        </div>
    </div>
</header>