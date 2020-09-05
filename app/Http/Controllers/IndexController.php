<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SecurityCode;
use App\Events\CodeFound;

class IndexController extends Controller
{
    public function index() {
        //dump(cache('setting'));
        return view('home.index');
    }

    public function show(Request $request) {
        $code = $request->code;
        $result = SecurityCode::where('security_code', $code)->first();
        if(!$result) {
            return view('home.fake');
        }
        //触发事件逻辑
        event(new CodeFound($result));
        return view('home.real', ['data' => $result]);
    }
}
