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
<<<<<<< HEAD
        ->header('Access-Control-Alown-Origin',"*")
        ->header('Access-Control-Alown-Methods',"PUT,POST,DELETE,GET,OPTIONS")
        ->header('Access-Control-Alown-Headers',"Accept,Authorisation,Content-Type,X-Request")
        ->header('Access-Control-Alown-Credentials',"true");

=======
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Origin,Content-Type,Accept, Authorization,X-Resquest')
        ->header('Access-Control-Allow-Credentials', 'true');
<<<<<<< HEAD
=======
        
>>>>>>> cfbc2ad52d553cf80126c754e2b6ede86370a153
>>>>>>> 557898fabf757c97e8e3289ccaf31f9cda69fb65
    }
}
