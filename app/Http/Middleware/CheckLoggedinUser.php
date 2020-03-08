<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoggedinUser
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
        if("login" ==  request()->segment(1))
        {
            if(auth()->check() && !auth()->user()->is_admin)
            {
                return redirect()->to('/dashboard');
            }
        }else if("login" == request()->segment(2))
        {
            if(auth()->check() && auth()->user()->is_admin)
            {
                return redirect()->to('/admin');
            };

        }
        return $next($request);
    }
}
