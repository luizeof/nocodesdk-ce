<?php

namespace App\Http\Controllers\Api\V1\Text;

use App\Libs\Text\MaskText;
use App\Http\Requests\Text\MaskRequest;
use App\Http\Controllers\Api\Controller;

class MaskController extends Controller
{
    public function handle(MaskRequest $request)
    {
        $output = MaskText::run($request->input('text'), $request->input('offset'), $request->input('char'));
        return $this->jsonResponse($request, $output);
    }
}
