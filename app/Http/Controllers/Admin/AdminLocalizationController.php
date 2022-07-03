<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Currency;
use App\Events\Localization;

class AdminLocalizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.international.localization', [
            'languages' => Language::allActive(),
            'currencies' => Currency::where(['in_use' => true, 'active' => true])->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Localization::dispatch();

        configuration(
            array_change_key_case($request->except('_token', 'auto_convert_price'), CASE_UPPER)
        );

        Cache::flush();
        Artisan::call('view:clear');

        return redirect()->route('admin.localization.index')->with('success', __('The configuration has been saved.'));
    }
}
