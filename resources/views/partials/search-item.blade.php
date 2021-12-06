<li>fdsafdsaf</li>
@foreach ($products as $product)
    <li>
        <a href="{{ route('product', ['category' => $product->category->slug, 'slug' => $product->slug]) }}">{{ $product->name }}</a>
    </li>
@endforeach