<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    public function create() {
        $data = Setting::first();
        return view('admin.setting.create', ['data' => $data]);
    }

    public function store(Request $request) {
        $datas = $request->all();
        if($request->file('logo')) {
            $datas['logo'] = $request->file('logo')->store('upload');
        }
        $row = Setting::first();
        if($row) {
            $row->update($datas);
            Cache::forget('setting');
            return back()->with('success', 1);
        }
        Setting::create($datas);

        return back()->with('success', 1);
    }
}
