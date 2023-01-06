<?php

namespace App\Http\Controllers\Api\V1\Text;

use App\Libs\Text\PadBothText;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Text\PadBothRequest;

class PadBothController extends Controller
{
    public function handle(PadBothRequest $request)
    {
        $output = PadBothText::run($request->input('text'), $request->input('size'), $request->input('char'));
        return $this->jsonResponse($request, $output);
    }
}
