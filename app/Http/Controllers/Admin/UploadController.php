<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request) {
        
        $file = $request->file('file')->store('uploads');
        
        return response()->json([
            'code' => 0,
            'msg' => '',
            'data' => [
                'src' => asset('storage/'.$file),
                'savepath' => $file
            ]
        ]);
   }
}
