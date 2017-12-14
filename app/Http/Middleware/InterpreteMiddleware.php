<?php

namespace App\Http\Middleware;

use Closure;

class InterpreteMiddleware
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
        if(Auth::guest())
        return redirect('/');
    
        if(Auth::user()->Interprete())
            return $next($request);

        return redirect('/home');
    }
}
