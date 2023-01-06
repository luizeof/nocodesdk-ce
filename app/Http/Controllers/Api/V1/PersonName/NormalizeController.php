<?php

namespace App\Http\Controllers\Api\V1\PersonName;

use App\Libs\PersonName\Normalize;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\PersonName\NormalizeRequest;

class NormalizeController extends Controller
{
    public function handle(NormalizeRequest $request)
    {
        $output = Normalize::run($request->name);
        return $this->jsonResponse($request, $output);
    }
}
