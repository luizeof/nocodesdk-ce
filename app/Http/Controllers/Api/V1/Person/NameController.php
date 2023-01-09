<?php

namespace App\Http\Controllers\Api\V1\Person;

use App\Libs\Person\Name;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\PersonName\NormalizeRequest;

class NameController extends Controller
{
    public function handle(NormalizeRequest $request)
    {
        $output = Name::run($request->name);
        return $this->jsonResponse($request, $output);
    }
}
