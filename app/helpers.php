<?php

use App\Models\Configuration;

if (! function_exists('configuration')) {
    function configuration($key = null, $default = null)
    {
        if (is_array($key)) {
            foreach ($key as $k => $v) {
                Configuration::updateOrCreate(['name' => $k], ['value' => $v]);
            }
            return $key;
        }

        return Configuration::getConfig($key, $default);
    }
}

if (! function_exists('isAdminUrl')) {
    function isAdminUrl()
    {
        return request()->segment(1) == config('app.admin');
    }
}

if (! function_exists('price')) {
    function price($price, $currency = null)
    {
        if (is_null($currency)) {
            $currency = configuration('default_currency');
        }

        return number_format($price, 2, '.', '') . ' ' . $currency;
    }
}
