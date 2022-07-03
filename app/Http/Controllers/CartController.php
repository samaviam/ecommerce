<?php

namespace App\Http\Controllers;

use App\Events\CartUpdated;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    private $currency;

    public function __construct()
    {
        $this->currency = \Currency::getUserCurrency() ?? configuration('default_currency');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::getContent();

        if ($carts->isEmpty()) {
            return view('checkout.cart-empty');
        }

        return view('checkout.cart', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product-id' => 'required|string',
            'product-quantity' => 'integer',
        ]);

        $product = Product::with('category')->findOrFail($request->input('product-id'));

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->regular_price,
            'quantity' => $request->input('product-quantity') ?? 1,
            'attributes' => [
                'slug' => $product->slug,
                'image' => $product->cover,
                'category' => $product->category->slug,
                'old_price' => $product->old_price ?? null,
                'reduction' => $product->reduction ?? null,
            ],
        ]);

        return response()->json(['total' => Cart::getTotalQuantity()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $defaultCurrency = configuration('default_currency');
        $currency = \Currency::getUserCurrency() ?? configuration('default_currency');

        Cart::update(
            $id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity,
                ],
            ]
        );

        return response()->json([
            'quantity' => Cart::getTotalQuantity(),
            'total' => currency(Cart::get($id)->getPriceSum(), $defaultCurrency, $currency),
            'subtotal' => currency(Cart::getSubTotal(), $defaultCurrency, $currency),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currency = \Currency::getUserCurrency() ?? configuration('default_currency');

        Cart::remove($id);

        return response()->json([
            'quantity' => Cart::getTotalQuantity(),
            'subtotal' => currency()->format(Cart::getSubTotal(), $currency),
        ]);
    }

    public function clear()
    {
        Cart::clear();

        return redirect()->route('cart.index');
    }
}
