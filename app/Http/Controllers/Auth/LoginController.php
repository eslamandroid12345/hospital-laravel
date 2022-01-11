<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //override login with email or mobile

    public function username()
    {

        $input = request()->input('two');
        $check = filter_var($input,FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        $request_merge = request()->merge([$check=>$input]);

        return $check;

    }
}
