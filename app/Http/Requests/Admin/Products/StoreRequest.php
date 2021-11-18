<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

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
            'name' => 'required|string|unique:products',
            'slug' => 'required|string|unique:products',
            'cover' => 'required|image',
            'images.*' => 'image',
            'quantity' => 'required|integer',
            'regular_price' => 'required|string',
            'short_description' => 'string',
            'description' => 'string',
            'active' => 'required|boolean',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
            'regular_price' => $this->input('price'),
            'short_description' => $this->input('short-description'),
            'active' => $this->has('active'),
        ]);
    }
}
