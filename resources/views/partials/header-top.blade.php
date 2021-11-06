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
                        <li class="menu-item" ><a title="hungary" href="#"><span class="img label-before"><img src="{{ asset('images/lang-hun.png') }}" alt="lang-hun"></span>Hungary</a></li>
                        <li class="menu-item" ><a title="german" href="#"><span class="img label-before"><img src="{{ asset('images/lang-ger.png') }}" alt="lang-ger" ></span>German</a></li>
                        <li class="menu-item" ><a title="french" href="#"><span class="img label-before"><img src="{{ asset('images/lang-fra.png') }}" alt="lang-fre"></span>French</a></li>
                        <li class="menu-item" ><a title="canada" href="#"><span class="img label-before"><img src="{{ asset('images/lang-can.png') }}" alt="lang-can"></span>Canada</a></li>
                    </ul>
                </li>
                <li class="menu-item menu-item-has-children parent" >
                    <a title="Dollar (USD)" href="#">Dollar (USD)<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <ul class="submenu curency" >
                        <li class="menu-item" >
                            <a title="Pound (GBP)" href="#">Pound (GBP)</a>
                        </li>
                        <li class="menu-item" >
                            <a title="Euro (EUR)" href="#">Euro (EUR)</a>
                        </li>
                        <li class="menu-item" >
                            <a title="Dollar (USD)" href="#">Dollar (USD)</a>
                        </li>
                    </ul>
                </li>
                @guest
                    <li class="menu-item" ><a title="Register or Login" href="{{ route('login') }}">Login</a></li>
                    <li class="menu-item" ><a title="Register or Login" href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="menu-item menu-item-has-children parent" >
                        <a title="My Account" href="#">My Account (Admin)<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="submenu curency" >
                            <li class="menu-item"><a href="#">Products</a></li>
                            <li class="menu-item"><a href="#">Categories</a></li>
                            <li class="menu-item"><a href="#">Coupons</a></li>
                            <li class="menu-item"><a href="#">Orders</a></li>
                            <li class="menu-item"><a href="#">Customers</a></li>
                            <li class="menu-item" ><a title="Logout" href="#">Logout</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-has-children parent" >
                        <a title="My Account" href="#">My Account (User)<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="submenu curency" >
                            <li class="menu-item"><a href="#">Orders</a></li>
                            <li class="menu-item"><a href="#">Address</a></li>
                            <li class="menu-item"><a href="#">Account Details</a></li>
                            <li class="menu-item" ><a title="Logout" href="#">Logout</a></li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</div>