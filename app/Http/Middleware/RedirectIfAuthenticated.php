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
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        $admin = isAdminUrl();

        foreach ($guards as $guard) {
            if ($guard == 'employee' && Auth::guard($guard)->check() && $admin) {
                return redirect()->route('admin');
            }

            if ($guard == 'user' && Auth::guard($guard)->check() && !$admin) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
