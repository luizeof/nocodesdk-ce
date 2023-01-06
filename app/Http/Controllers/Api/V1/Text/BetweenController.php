<?php

namespace App\Http\Controllers\Api\V1\Text;

use App\Libs\Text\BetweenText;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Text\BetweenRequest;

class BetweenController extends Controller
{
    public function handle(BetweenRequest $request)
    {
        $output = BetweenText::run($request->input('text'), $request->input('start'), $request->input('end'));
        return $this->jsonResponse($request, $output);
    }
}
