<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class ApiRequest extends FormRequest
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
     * If validator fails return the exception in json form
     * @param Validator $validator
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }

    public function failedAuthorization()
    {
        throw new AuthorizationException("You don't have the authority to update this post");
    }

    public function inputAsInt($name)
    {
        return intval(mb_convert_encoding($this->input($name), "UTF-8"));
    }

    public function inputAsFloat($name)
    {
        return floatval(mb_convert_encoding($this->input($name), "UTF-8"));
    }

    public function inputAsString($name)
    {
        return mb_convert_encoding($this->input($name), "UTF-8");
    }

    public function inputAsLowerCaseString($name)
    {
        return strtolower($this->inputAsString($name));
    }

    public function inputAsUpperCaseString($name)
    {
        return strtoupper($this->inputAsString($name));
    }

    abstract public function rules();
}
