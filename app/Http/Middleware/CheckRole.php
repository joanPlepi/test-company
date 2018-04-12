<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next ,$role)
    {
        // $route = $request->route();
        // $action = $route->getAction();
        // $routeRole = $action['role'];
        $userRole = $request->user()->role->name;

        if( $userRole != $role )
            return redirect()->home();
        
        return $next($request);
    }
}
