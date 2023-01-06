<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exceptions\ContentType\RequestNotAcceptImagePngException;

class EnsureContentTypeImagePng
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
        if (Str::contains($request->header('CONTENT_TYPE') ?? '', ['/image/png', 'image/png']) == false) {
            throw new RequestNotAcceptImagePngException();
        }
        return $next($request);
    }
}
