<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Admin\Products\StoreRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;
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
        $products = Product::paginate(10);

        return view('admin.catalog.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
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
