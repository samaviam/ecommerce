<ul class="product-list grid-products equal-container">
    @foreach ($products as $product)
        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
            @include('catalog.product-block', compact('product'))
        </li>
    @endforeach
</ul>