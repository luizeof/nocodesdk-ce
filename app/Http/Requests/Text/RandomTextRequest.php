<?php

namespace App\Http\Requests\Text;

use App\Http\Requests\ApiRequest;

class RandomTextRequest extends ApiRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'size' => $this->size,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'size' => ['required', 'numeric'],
        ];
    }
}
