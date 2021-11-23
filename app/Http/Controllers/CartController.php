<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
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
            'product-quantity' => 'required|integer',
        ]);

        $product = Product::findOrFail($request->input('product-id'));

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->regular_price,
            'quantity' => $request->input('product-quantity'),
            'attributes' => [
                'slug' => $product->slug,
                'image' => $product->cover,
            ],
        ]);

        $total = Cart::getTotalQuantity();

        return response()->json(compact('total'));
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
        Cart::update(
            $id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity,
                ],
            ]
        );

        session()->flash('success', __('Item Cart is Updated Successfully!'));

        return redirect()->route('cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        session()->flash('success', __('Item Cart Remove Successfully!'));

        return redirect()->route('cart');
    }

    public function destroyAll()
    {
        Cart::clear();

        session()->flash('success', __('All Item Cart Clear Successfully!'));

        return redirect()->route('cart');
    }
}
