<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

          $userRoles = Auth::user()->roles->pluck('name');

          if($userRoles->contains('Admin')){
            return redirect('admin_dashboard');
          }
          elseif($userRoles->contains('Salesman')){
            return redirect('salesman_dashboard');
          }
          else{
            return redirect('denied');
          }
        }
        return $next($request);
    }
}
