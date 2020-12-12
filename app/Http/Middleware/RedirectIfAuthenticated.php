<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check())
        {
            //other tutu
            //return redirect('/home');
            $role = Auth::user()->role;

            switch ($role)
            {
                case 'admin':
                    return redirect('admin_dashboard');
                    break;
                case 'mentor':
                    return redirect('mentor_dashboard');
                    break;
                case 'mentee':
                    return redirect('mentee_dashboard');
                    break;
            }
        }

        return $next($request);
    }
}
