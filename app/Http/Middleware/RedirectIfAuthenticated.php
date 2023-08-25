<?php

namespace App\Http\Middleware;

use App\Period;
use App\Providers\RouteServiceProvider;
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
            $role = Auth::user()->role;
            if ($role == 'admin') {
                return redirect('/admin');
            } else if ($role == 'player') {
                $activePeriod = Period::where('status', '!=', 'standby')->first();
                if ($activePeriod->name == 'export') {
                    return redirect('/export');
                }
                else if($activePeriod->name == 'import'){
                    return redirect('/import');
                }
                else if($activePeriod->name == 'exportimport'){
                    return redirect('/exportimport');
                }
            } else if ($role == 'penpos') {
                return redirect('/penpos');
            }
        }

        return $next($request);
    }
}
