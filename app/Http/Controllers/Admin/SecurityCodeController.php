<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\SecurityCode;
use Illuminate\Http\Request;
use App\Http\Requests\SecurityCodeRequest;

class SecurityCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = SecurityCode::filter(request()->all()??[])->latest()->paginate();
        return view('admin.securitycode.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.securitycode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SecurityCodeRequest $request)
    {
        SecurityCode::create($request->input());
        return redirect()->route('admin.securitycode.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SecurityCode $securitycode)
    {
        return view('admin.securitycode.create', ['data' => $securitycode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SecurityCodeRequest $request, SecurityCode $securitycode)
    {
        $securitycode->update($request->input());
        return redirect()->route('admin.securitycode.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
