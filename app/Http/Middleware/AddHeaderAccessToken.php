<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Add Authorization Bearer to Request if $token exists in url
 */
class AddHeaderAccessToken
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
        if ($request->token) {
            $request->headers->set('Authorization', 'Bearer ' . $request->token);
        }

        return $next($request);
    }
}
