<?php

namespace App\Http\Middleware;

use Closure;

class GroupMiddleware
{
    /**
     * Мидл, проверяющий - админ ли пользуется страницей и совершает действия.
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
