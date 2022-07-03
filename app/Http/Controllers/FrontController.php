<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\Banner;
use App\Models\Product;
use App\Models\SpecificPrice;
use App\Models\Category;
use App\Models\Slider;
use App\Events\CurrencyChanged;

class FrontController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('checkout');
    }

    public function index()
    {
        $onSales = Product::has('specificPrice')->get();

        return view('index', [
            'slider' => Slider::all(),
            'banners' => Banner::homepage(),
            'onSales' => $onSales,
        ]);
    }

    public function changeCurrency($code)
    {
        $code = strtoupper($code);

        Currency::where(['code' => $code, 'in_use' => true, 'active' => true])->firstOrFail();

        // CurrencyChanged::dispatch($code);

        session()->put('currency', $code);

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->get('product');
        $products = Product::with('category')
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('reference', 'like', '%' . $search . '%')
            ->limit(5);

        return view('partials.search-item', compact('products'));
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

        $products = $products->where('active', true)->with('category', 'specificPrice')->paginate($perPage);

        if ($request->ajax()) {
            return view('catalog.products', compact('products'));
        }

        $populars = Product::populars();
        $categories = Category::where('active', true)->get();

        return view('cms.shop', compact('products', 'populars', 'categories'));
    }

    public function aboutUs()
    {
        return view('cms.about-us');
    }

    public function contactUs()
    {
        return view('cms.contact-us');
    }

    public function category(Request $request, $slug)
    {
        $category = Category::bySlug($slug);
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

        $products = $products->where(['category_id' => $category->id, 'active' => true])->with('category')->paginate($perPage);

        if ($request->ajax()) {
            return view('catalog.products', compact('products'));
        }

        $populars = Product::populars();
        $categories = Category::where('active', true)->get();

        return view('cms.shop', compact('products', 'populars', 'categories'));
    }

    public function product($category, $slug)
    {
        $category = Category::bySlug($category);
        $product = Product::bySlug($slug);
        $populars = Product::populars();

        return view('catalog.product', compact('category', 'product', 'populars'));
    }

    public function wishlist()
    {
        return view('cms.wishlist');
    }

    public function checkout()
    {
        $addresses = auth()->user()->addresses;
        return view('checkout.checkout', compact('addresses'));
    }
}
