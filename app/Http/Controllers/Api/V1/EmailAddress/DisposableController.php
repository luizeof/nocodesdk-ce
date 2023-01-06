<?php

namespace App\Http\Controllers\Api\V1\EmailAddress;

use App\Http\Controllers\Api\Controller;
use App\Libs\EmailAddress\DisposableValidation;
use App\Http\Requests\EmailAddress\ValidationRequest;

class DisposableController extends Controller
{
    /**
     * Validate the Request
     *
     * @param  ValidationRequest  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function handle(ValidationRequest $request)
    {
        $output = DisposableValidation::run($request->email);

        return $this->jsonResponse($request, $output);
    }
}
