<?php

namespace App\Http\Middleware;

use Closure;

class RedirectAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!auth()->check() && !$request->expectsJson())
        {
            return redirect()->route('admin-login');
        }
        if(!$request->user()->is_admin){
            return redirect()->route('login');
        }
        return $next($request);
    }
}
