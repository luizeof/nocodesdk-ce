<?php

namespace App\Http\Controllers\Api\V1\Text;

use App\Libs\Text\RandomText;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Text\RandomTextRequest;

class RandomController extends Controller
{
    public function handle(RandomTextRequest $request)
    {
        $output = RandomText::run($request->input('size'));
        return $this->jsonResponse($request, $output);
    }
}
