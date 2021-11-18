<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontController extends Controller
{
    public function shop()
    {
        $products = Product::allActive();
        $populars = Product::populars();

        return view('shop', compact('products', 'populars'));
    }

    public function product($slug)
    {
        $product = Product::bySlug($slug);
        $populars = Product::populars();

        return view('product', compact('product', 'populars'));
    }
}
