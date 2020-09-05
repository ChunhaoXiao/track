@extends('admin.layout')

@section('content_header')
    <h1>添加公司</h1>
@endsection

@section('content')
<div class="container pt-2">
    <form action="{{isset($data) ? route('admin.company.update', $data): route('admin.company.store') }}" method="post" enctype="multipart/form-data">
        <x-textinput label="公司名称" name="name" :value="$data->name??''"/>
        <x-textinput label="公司logo" name="logo" type="file" :value="$data->logo??''"/>
        <x-textinput label="公司地址" name="address" :value="$data->address??''"/>
        <x-textinput label="公司电话" name="phone" :value="$data->phone??''"/>
        <x-textinput label="公司网址" name="website" :value="$data->website??''"/>
            @isset($data) @method('PUT') @endisset
        <x-submitbutton />
    </form>
</div>
   
@endsection