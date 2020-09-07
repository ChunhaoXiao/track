<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    public function username()
    {
        return 'name';
    }

    public function showLoginForm() {
        return view('admin.auth.login');
    }

    protected function guard() {
        return Auth::guard('admin');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended('/admin');
    }

    protected function loggedOut(Request $request)
    {
        return redirect()->route('admin.index');
    }
}
