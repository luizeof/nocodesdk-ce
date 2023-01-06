<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Exceptions\ContentType\RequestNotAcceptImageSvgException;

class EnsureContentTypeImageSvg
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Str::contains($request->header('CONTENT_TYPE') ?? '', ['image/svg', 'svg+xml']) == false) {
            throw new RequestNotAcceptImageSvgException();
        }
        return $next($request);
    }
}
