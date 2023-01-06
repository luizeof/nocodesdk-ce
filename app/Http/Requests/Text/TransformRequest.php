<?php

namespace App\Http\Requests\Text;

use App\Http\Requests\ApiRequest;

class TransformRequest extends ApiRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'text' => $this->text,
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
            'text' => ['required'],
        ];
    }
}
