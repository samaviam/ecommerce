<?php

namespace App\Http\Requests\Admin\Categories;

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
        $isUnique = $this->method === 'POST' ? '|unique:categories' : '';

        return [
            'name' => 'required|string' . $isUnique,
            'slug' => 'required|string' . $isUnique,
            'description' => 'string',
            'meta_title' => 'string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'string|max:512',
            'active' => 'required|boolean',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'meta_title' => $this->input('meta-title'),
            'meta_description' => $this->input('meta-description'),
            'active' => $this->has('active'),
        ]);
    }
}
