<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Currencies\Request as CurrencyRequest;
// use PragmaRX\Countries\Package\Countries;

class AdminCurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.international.currency', [
            'currencies' => Currency::where('in_use', true)->orderBy('updated_at', 'DESC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currencies = Currency::allActive()->pluck('name', 'code');
        // Countries::all()->map(function ($country) use (&$currencies) {
        //     if (!isset($country['currencies'])) {
        //         return;
        //     }
        //     foreach ($country->currencies as $currency) {
        //         $currency = is_array($currency) ? $currency['name'] : $currency;
        //         $currencies[$currency] = $currency . ' (' . $country->name['common'] . ')';
        //     }
        // });
        return view('admin.international.currency.create', compact('currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Currencies\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyRequest $request)
    {
        $validated = $request->validated();

        if ($request->has('custom')) {
            Currency::create([
                'name' => $validated['name'],
                'code' => $validated['code'],
                'symbol' => $validated['symbol'],
                'format' => $validated['format'],
                'exchange_rate' => $validated['exchange_rate'],
                'in_use' => true,
                'active' => true,
            ]);

            return redirect()->route('admin.currency.index');
        }

        Currency::where('code', $validated['currency'])->update([
            'exchange_rate' => $validated['exchange_rate'],
            'in_use' => true,
        ]);

        return redirect()->route('admin.currency.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    // public function show(Currency $currency)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return view('admin.international.currency.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Currencies\Request  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyRequest $request, Currency $currency)
    {
        $currency->update($request->validated());

        return redirect()
            ->route('admin.currency.index')
            ->with('success', __('Currency updated.'));
    }

    public function changeStatus(Currency $currency)
    {
        if ($currency->code == configuration('default_currency')) {
            return response([__('Error'), __('Cannot disable default currency')], 422);
        }

        $currency->active = !$currency->active;
        $currency->save();

        Cache::flush();

        return response([__('Success'), __('The currency has been changed status.')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();

        Cache::flush();

        return response([__('Success'), __('The currency was successfully removed.')]);
    }

    public function get(Request $request)
    {
        $currency = Currency::where('code', $request->code)->first();

        return response()->json($currency);
    }
}
