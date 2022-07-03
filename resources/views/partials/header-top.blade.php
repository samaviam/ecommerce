<div class="topbar-menu-area">
    <div class="container">
        <div class="topbar-menu left-menu">
            <ul>
                <li class="menu-item">
                    <a title="Hotline: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
                </li>
            </ul>
        </div>
        <div class="topbar-menu right-menu">
            <ul>
                <li class="menu-item lang-menu menu-item-has-children parent">
                    <a title="English" href="#"><span class="img label-before"><img src="{{ asset('images/lang-en.png') }}" alt="lang-en"></span>English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <ul class="submenu lang" >
                        <li class="menu-item"><a title="hungary" href="#"><span class="img label-before"><img src="{{ asset('images/lang-hun.png') }}" alt="lang-hun"></span>Hungary</a></li>
                        <li class="menu-item"><a title="german" href="#"><span class="img label-before"><img src="{{ asset('images/lang-ger.png') }}" alt="lang-ger" ></span>German</a></li>
                        <li class="menu-item"><a title="french" href="#"><span class="img label-before"><img src="{{ asset('images/lang-fra.png') }}" alt="lang-fre"></span>French</a></li>
                        <li class="menu-item"><a title="canada" href="#"><span class="img label-before"><img src="{{ asset('images/lang-can.png') }}" alt="lang-can"></span>Canada</a></li>
                    </ul>
                </li>
                @if (count($currencies) > 1)
                    <li class="menu-item menu-item-has-children parent">
                        @php $currency = \App\Models\Currency::getDefault() @endphp
                        <a title="{{ $currency->code }} {{ $currency->symbol }}" href="#">{{ $currency->code }} {{ $currency->symbol }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="submenu currency">
                            @foreach ($currencies as $currency)
                                <li class="menu-item">
                                    <a title="{{ $currency->code }} {{ $currency->symbol }}" href="{{ route('currency', strtolower($currency->code)) }}">{{ $currency->code }} {{ $currency->symbol }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
                @guest
                    <li class="menu-item" ><a title="Register or Login" href="{{ route('login') }}">Login</a></li>
                    <li class="menu-item" ><a title="Register or Login" href="{{ route('register') }}">Register</a></li>
                @else
                    @can('hired')
                        <li class="menu-item menu-item-has-children parent" >
                            <a title="My Account" href="{{ route('dashboard') }}">My Account (Admin)<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="submenu curency" >
                                <li class="menu-item"><a href="#">Products</a></li>
                                <li class="menu-item"><a href="#">Categories</a></li>
                                <li class="menu-item"><a href="#">Coupons</a></li>
                                <li class="menu-item"><a href="#">Orders</a></li>
                                <li class="menu-item"><a href="#">Customers</a></li>
                                <li class="menu-item" ><a title="Logout" href="#">Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="menu-item menu-item-has-children parent" >
                            <a title="My Account" href="{{ route('dashboard') }}">My Account ({{ auth()->user()->name }})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="submenu curency" >
                                <li class="menu-item"><a href="{{ route('dashboard.order-history') }}">{{ __('Order history') }}</a></li>
                                <li class="menu-item"><a href="{{ route('dashboard.addresses.index') }}">{{ __('Addresses') }}</a></li>
                                <li class="menu-item"><a href="#">Account Details</a></li>
                                <li class="menu-item" ><a title="Logout" href="{{ route('logout') }}" onclick="(e => {e.preventDefault();$('#logout').submit()})(event)">Logout</a></li>
                            </ul>
                            <form action="{{ route('logout') }}" method="post" id="logout">
                                @csrf
                            </form>
                        </li>
                    @endcan
                @endguest
            </ul>
        </div>
    </div>
</div>