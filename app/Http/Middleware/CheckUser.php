<?php

namespace App\Http\Middleware;

use Closure;
use Auth; //para ver se está logado

class CheckUser
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
        $user = Auth::user();

        if($user) {
        return $next($request);
        } else {
            return redirect ('/login');
        }
    }
}
