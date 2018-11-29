<?php

namespace Bookstore\Http\Middleware;

use Closure;
use Auth;

class MustBeAdmin
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
        //return $next($request);

        //si no esta logeado, lo devuelve al welcome
        if (!$request->user()) {
            return redirect('/');
        }
        if ($request->user()->isAdmin()) {
            return $next($request);
        }
        return redirect('/');//user is not admin
    }
}
