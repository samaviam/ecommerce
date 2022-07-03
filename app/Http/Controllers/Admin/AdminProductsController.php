<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Admin\Products\Request as StoreRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Currency;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catalog.products', [
            'products' => Product::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::allActive();
        $currency = Currency::where('code', configuration('default_currency'))->first();

        return view('admin.catalog.product.create', compact('categories', 'currency'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Products\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $product = Product::create(
            $request->safe()->except(['cover', 'images'])
        );

        $dir = 'images/p/' . $product->id;
        mkdir(storage_path('app/' . $dir));

        $cover = $this->uploadImage($dir, $request->file('cover'));

        $images = [];
        foreach ($request->file('images') as $image) {
            $images[] = $this->uploadImage($dir, $image);
        }

        $product->fill([
            'cover' => $cover,
            'images' => $images,
        ])->save();

        Cache::flush();

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $currency = Currency::where('code', configuration('default_currency'))->first();

        return view('admin.catalog.product.edit', [
            'product' => $product,
            'currency' => $currency,
            'categories' => Category::allActive(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Products\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Product $product)
    {
        $product->update($request->validated());

        Cache::flush();

        return redirect()
            ->route('admin.products.index')
            ->with('success', __('Product(:name) updated.', ['name' => $product->name]));
    }

    public function changeStatus(Product $product)
    {
        $product->active = !$product->active;
        $product->save();

        Cache::flush();

        return response([__('Success'), __('The product has been changed status.')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        Cache::flush();

        return response([__('Success'), __('The product was successfully removed.')]);
    }

    private function uploadImage($dir, $image)
    {
        $name = $image->getClientOriginalName();
        $image->storeAs($dir, $name);

        return $name;
    }
}
