<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerFinancial
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->level != 'Gestor' && Auth::user()->level != 'Administrador'){

            if (Auth::user()->level != 'Finanças') {
                return redirect()->back()->with('NoAuth', '1');
            }
        }
        return $next($request);
    }
}
