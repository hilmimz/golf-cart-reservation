<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->guest()) {
            return redirect('/login');
        }
        elseif (auth()->user()->type == 2) {
            return redirect('/dashboard_driver');
        }
        elseif (auth()->user()->type == 3) {
            return redirect('/dashboard_admin');
        }
        return $next($request);
    }
}
