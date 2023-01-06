<?php

namespace App\Http\Requests\Text;

use App\Http\Requests\ApiRequest;

class MaskRequest extends ApiRequest
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
            'char' => $this->char,
            'offset' => $this->offset,
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
            'char' => ['required'],
            'offset' => ['required', 'numeric'],
        ];
    }
}
