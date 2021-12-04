<ul class="product-list grid-products equal-container">
    @foreach ($products as $product)
        @php
            $route = route('product', ['category' => $product->category->slug, 'slug' => $product->slug]);
        @endphp
        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
            <div class="product product-style-3 equal-elem">
                <div class="product-thumnail">
                    <a href="{{ $route }}" title="{{ $product->name }}">
                        <figure><img src="{{ asset('storage/images/p/' . $product->id . '/' . $product->cover) }}" alt="{{ $product->name }}"></figure>
                    </a>
                </div>
                <div class="product-info">
                    <a href="{{ $route }}" class="product-name"><span>{{ $product->name }}</span></a>
                    <div class="wrap-price"><span class="product-price">{{ __('$:price', ['price' => $product->regular_price]) }}</span></div>
                    <form class="add-to-cart-form" action="{{ route('cart.store') }}" method="POST">
                        <input type="hidden" name="product-id" value="{{ $product->id }}" >
                        <button class="btn add-to-cart">
                            {{ __('Add to Cart') }}
                            <span {!! Cart::has($product->id) ? 'style="display: flex;"' : '' !!}><i class="fa fa-check"></i></span>
                        </button>
                    </form>
                </div>
            </div>
        </li>
    @endforeach
</ul>