<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use SEOToolsTrait;
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
}
