<?php

namespace App\Http\Controllers\Api\V1\Text;

use App\Libs\Text\Decode64Text;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Text\TransformRequest;

class Decode64Controller extends Controller
{
    public function handle(TransformRequest $request)
    {
        $output = Decode64Text::run($request->input('text'));
        return $this->jsonResponse($request, $output);
    }
}
