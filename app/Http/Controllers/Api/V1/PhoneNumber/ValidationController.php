<?php

namespace App\Http\Controllers\Api\V1\PhoneNumber;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\PhoneNumber\ValidationRequest;
use App\Libs\PhoneNumber\Validation as PhoneNumberValidation;

class ValidationController extends Controller
{
    public function handle(ValidationRequest $request)
    {
        $output = PhoneNumberValidation::run($request->phone, $request->country);
        return $this->jsonResponse($request, $output);
    }
}
