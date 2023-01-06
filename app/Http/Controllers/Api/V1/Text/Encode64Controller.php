<?php

namespace App\Http\Controllers\Api\V1\Text;

use App\Libs\Text\Encode64Text;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Text\TransformRequest;

class Encode64Controller extends Controller
{
    public function handle(TransformRequest $request)
    {
        $output = Encode64Text::run($request->input('text'));
        return $this->jsonResponse($request, $output);
    }
}
