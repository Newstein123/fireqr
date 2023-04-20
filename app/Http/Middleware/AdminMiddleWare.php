<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        if(auth()->user()->hasRole('user')) {
            auth()->logout();
            return redirect('/')->back()->with('message', 'Access Denied');
        } elseif(auth()->user()->status == 1) {
            auth()->logout();
            return redirect('/login')->with('message', 'Access Denied');
        }

        return $next($request);
    }
}
