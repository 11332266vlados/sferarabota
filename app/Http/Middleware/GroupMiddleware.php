<?php

namespace App\Http\Middleware;

use Closure;

class GroupMiddleware
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
        if($request->user()->group != 2){
            return redirect('/');
        }
        return $next($request);
    }
}
