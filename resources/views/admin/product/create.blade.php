@extends('admin.layout')

@section('content_header')
    <h1>添加产品</h1>
@endsection

@section('content')
<div class="container pt-2">
    <form action="{{ isset($data)? route('admin.product.update', $data) : route('admin.product.store') }}" method="post">
        <x-textinput label="产品名称" name="name" :value="$data->name??''"/>
        <x-textinput label="品牌" name="brand" :value="$data->brand??''"/>
        <div class="form-group row">
            <label for="" class="col-form-label col-sm-1">产品图片</label>
            <div class="col-sm-10">
                <x-jqueryupload id="album" name="pictures[]" :pictures="$data->pictures??[]"/>
            </div>
        </div>
        <x-select label="所属公司" :options="$companies" name="company_id" :selected="$data->company_id??''"/>
        <x-textarea text="产品规格(参数)" name="params" labelcol="1" :value="$data->params??''"/>
        <x-textarea text="产品描述" name="description" labelcol="1" :value="$data->description??''"/>
        @isset($data) @method('PUT') @endisset
        <x-submitbutton />
    </form>
</div>
   
@endsection