<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $guard=null)
    {
        if(Auth::user()->role_id==$guard){
            return $next($request);
        }
        return redirect('/');
    }
}
