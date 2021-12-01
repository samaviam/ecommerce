<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|string|unique:categories',
            'slug' => 'required|string|unique:categories',
            'description' => 'string',
            'meta_title' => 'string|max:255',
            'meta_description' => 'string|max:512',
            'active' => 'required|boolean',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'meta_title' => $this->input('meta-title') ?? $this->input('name'),
            'meta_description' => $this->input('meta-description') ?? strip_tags($this->input('description')),
            'active' => $this->has('active'),
        ]);
    }
}
