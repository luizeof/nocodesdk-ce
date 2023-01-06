<?php

namespace App\Http\Requests\PhoneNumber;

use App\Http\Requests\ApiRequest;

class ValidationRequest extends ApiRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        //
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => ['required', 'string'],
            'country' => ['nullable'],
        ];
    }
}
