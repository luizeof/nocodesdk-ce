<?php

namespace App\Http\Requests\Text;

use App\Http\Requests\ApiRequest;

class BetweenRequest extends ApiRequest
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
            'start' => $this->start,
            'end' => $this->end,
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
            'start' => ['required'],
            'end' => ['required'],
        ];
    }
}
