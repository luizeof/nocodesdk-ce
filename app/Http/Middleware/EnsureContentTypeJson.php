<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exceptions\ContentType\RequestNotAcceptJsonException;

class EnsureContentTypeJson
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
        if (Str::contains($request->header('CONTENT_TYPE') ?? '', ['/json', '+json']) == false) {
            throw new RequestNotAcceptJsonException();
        }
        return $next($request);
    }
}
