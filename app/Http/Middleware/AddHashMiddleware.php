<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddHashMiddleware
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
        $response = $next($request);

        $hash = md5($response);

        $response = $response->setContent($response->getContent().$hash);
        return $response;
//        return $next($request);
    }
}
