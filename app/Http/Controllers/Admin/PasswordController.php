<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Auth;
class PasswordController extends Controller
{
    public function create() {
        return view('admin.auth.password');
    }

    public function update(PasswordRequest $request) {
        Auth::user()->update(['password' => $request->password]);
        Auth::logout();
        return redirect()->route('admin.index');
    }
}
