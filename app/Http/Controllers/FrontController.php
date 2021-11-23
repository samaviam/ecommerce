<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('checkout');
    }

    public function index()
    {
        return view('index');
    }

    public function shop()
    {
        $products = Product::allActive();
        $populars = Product::populars();

        return view('cms.shop', compact('products', 'populars'));
    }

    public function aboutUs()
    {
        return view('cms.about-us');
    }

    public function contactUs()
    {
        return view('cms.contact-us');
    }

    public function product($slug)
    {
        $product = Product::bySlug($slug);
        $populars = Product::populars();

        return view('catalog.product', compact('product', 'populars'));
    }

    public function wishlist()
    {
        return view('cms.wishlist');
    }

    public function checkout()
    {
        return view('checkout.checkout');
    }
}
