<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated($request, $user)
    {
        // Redirect berdasarkan role pengguna
        switch ($user->role) {
            case 'superadmin':
                return redirect('/home-admin');
            case 'mentor':
                return redirect('/home-mentor');
            case 'user':
                return redirect('/home');
            default:
                return redirect('/home'); // Fallback jika role tidak dikenal
        }
    }
}