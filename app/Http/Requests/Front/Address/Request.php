<?php

namespace App\Http\Requests\Front\Address;

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
            'user_id' => 'required',
            'state_id' => 'required|exists:states,_id',
            'name' => 'string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'company' => 'string',
            'address1' => 'required|string',
            'address2' => 'string',
            'postcode' => 'required|string|size:11',
            'city' => 'required|string',
            'phone' => 'required',
            'phone_mobile' => 'required',
            'active' => 'required',
            'deleted' => 'nullable',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->id(),
            'state_id' => $this->input('state'),
            'active' => true,
            'deleted' => null,
        ]);
    }
}
