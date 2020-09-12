@extends('admin.layout')

@section('content_header')
    <h1>添加公司</h1>
@endsection

@section('content')
<div class="container pt-2">
    <form action="{{isset($data) ? route('admin.company.update', $data): route('admin.company.store') }}" method="post" enctype="multipart/form-data">
        <x-textinput label="公司名称" name="name" :value="$data->name??''"/>
        <!-- <x-textinput label="公司logo" name="logo" type="file" :value="$data->logo??''"/> -->
            <div class="form-group row">
            <label class="col-form-label col-sm-1">公司logo</label>
            <div class="col-sm-6">
                <x-simpleuploader name="logo" single="1" :pictures="$data->logo??''" id="logo"/>
            </div>
        </div>
        <x-textinput label="公司地址" name="address" :value="$data->address??''"/>
        <x-textinput label="公司电话" name="phone" :value="$data->phone??''"/>
        <x-textinput label="公司网址" name="website" :value="$data->website??''"/>
            @isset($data) @method('PUT') @endisset
        <x-submitbutton />
    </form>
</div>
   
@endsection