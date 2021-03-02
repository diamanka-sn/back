<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
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
        return $next($request)
        ->header('Access-Control-Alown-Origin',"*")
        ->header('Access-Control-Alown-Methods',"PUT,POST,DELETE,GET,OPTIONS")
        ->header('Access-Control-Alown-Headers',"Accept,Authorisation,Content-Type,X-Request")
        ->header('Access-Control-Alown-Credentials',"true");

    }
}
