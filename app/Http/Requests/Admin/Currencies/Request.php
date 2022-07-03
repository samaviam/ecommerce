<?php

namespace App\Http\Requests\Admin\Currencies;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'currency' => 'required_if:custom,false|exists:currencies,code',
            'name' => 'required_if:custom,true|string',
            'code' => 'required_if:custom,true|string',
            'symbol' => 'required_if:custom,true|string',
            'format' => 'required_if:custom,true|string',
            'exchange_rate' => 'required|numeric|min:1',
        ];
    }
}
