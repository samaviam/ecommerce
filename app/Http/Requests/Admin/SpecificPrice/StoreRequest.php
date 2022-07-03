<?php

namespace App\Http\Requests\Admin\SpecificPrice;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Currency;

class StoreRequest extends FormRequest
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
            'user_id' => 'nullable|exists:users,_id',
            'product_id' => 'required|exists:products,_id',
            'from' => 'required|date',
            'to' => 'required|date',
            'start_from' => 'required|numeric',
            'reduction' => 'required|numeric',
            'reduction_type' => 'required',
            'active' => 'required|boolean',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'active' => $this->has('active'),
        ]);
    }
}
