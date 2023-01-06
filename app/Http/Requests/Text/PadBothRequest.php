<?php

namespace App\Http\Requests\Text;

use App\Http\Requests\ApiRequest;

class PadBothRequest extends ApiRequest
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
            'size' => $this->size,
            'char' => $this->char,
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
            'size' => ['required', 'numeric'],
            'char' => ['required'],
        ];
    }
}
