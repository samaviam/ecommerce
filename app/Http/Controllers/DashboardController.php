<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('customer.dashboard');
    }

    public function orderHistory(Request $request)
    {
        return view('customer.order-history');
    }

    public function addresses(Request $request)
    {
        return view('customer.addresses', [
            'addresses' => auth()->user()->addresses,
        ]);
    }

    public function wishlist(Request $request)
    {
        return view('customer.wishlist');
    }
}
