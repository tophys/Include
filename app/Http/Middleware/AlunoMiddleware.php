<?php

namespace App\Http\Middleware;

use Closure;

class AlunoMiddleware
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
        
        if(Auth::user()->Aluno())
            return $next($request);

        return redirect('/home');
    }
}
