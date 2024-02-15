<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            redirect()->route('login.view');
        }
        
        if (Auth::check() && in_array($request->route()->getName(), ['login.view', 'login.auth', 'signup.view', 'signup.register'])) {
            return redirect()->route('movies.view');
        }

        return $next($request);
    }
}
