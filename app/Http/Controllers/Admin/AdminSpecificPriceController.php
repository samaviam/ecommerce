<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use App\Notifications\UserSpecialPrice;
use App\Models\SpecificPrice;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SpecificPrice\StoreRequest;

class AdminSpecificPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catalog.specific-price', [
            'prices' => SpecificPrice::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog.specific-price.create', [
            'currencies' => Currency::usable()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\SpecificPrice\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $userId = $request->safe()->user_id;
        $users = $userId ? User::find($userId) : User::all();

        $specificPrice = SpecificPrice::create($request->safe()->toArray());

        Notification::send(
            $users,
            new UserSpecialPrice($specificPrice)
        );

        Cache::clear();

        return redirect()->route('admin.specific-price.index')->with('success', __('Specific price created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpecificPrice  $specificPrice
     * @return \Illuminate\Http\Response
     */
    public function show(SpecificPrice $specificPrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpecificPrice  $specificPrice
     * @return \Illuminate\Http\Response
     */
    public function edit(SpecificPrice $specificPrice)
    {
        return view('admin.catalog.specific-price.edit', [
            'specificPrice' => $specificPrice,
            'currencies' => Currency::usable()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SpecificPrice  $specificPrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpecificPrice $specificPrice)
    {
        //
    }

    public function changeStatus(SpecificPrice $specificPrice)
    {
        $specificPrice->active = !$specificPrice->active;
        $specificPrice->save();

        Cache::flush();

        return response([__('Success'), __('The specific price has been changed status.')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpecificPrice  $specificPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpecificPrice $specificPrice)
    {
        $specificPrice->delete();

        Cache::flush();

        return response([__('Success'), __('The specific price has been deleted.')]);
    }
}
