<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Period;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo()
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            return '/admin';
        } else if ($role == 'player') {
            $activePeriod = Period::where('status', '!=', 'standby')->first();
            if ($activePeriod != null) {
                if ($activePeriod->name == 'export') {
                    return '/export';
                } else if ($activePeriod->name == 'import') {
                    return '/import';
                } else if ($activePeriod->name == 'exportimport') {
                    return '/exportimport';
                }
            } else {
                Auth::logout();
                session()->flash('error', 'Tidak ada sesi yang berlangsung!');
                return '/login';
            }
        } else if ($role == 'penpos') {
            return '/penpos';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
