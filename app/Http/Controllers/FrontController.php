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

    public function shop(Request $request)
    {
        $orderBy = $request->get('order-by', 'date');
        $perPage = $request->get('per-page', 12);

        switch($orderBy) {
            case 'date':
                $products = Product::orderBy('created_at', 'desc');
                break;
            case 'price':
                $products = Product::orderBy('regular_price');
                break;
            case 'price-desc':
                $products = Product::orderBy('regular_price', 'desc');
                break;
        }

        $products = $products->where('active', true)->paginate($perPage);
        $populars = Product::populars();

        if ($request->ajax()) {
            return view('catalog.products', compact('products'));
        }

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
