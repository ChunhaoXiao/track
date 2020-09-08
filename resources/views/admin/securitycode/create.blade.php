@extends('admin.layout')

@section('content_header')
    <h1>添加批次</h1>
@endsection

@section('content')
<div class="container pt-2">
    <form action="{{isset($data)? route('admin.securitycode.update', $data) : route('admin.securitycode.store') }}" method="post">
        <x-textinput label="防伪码" name="code"  :value="$data->code??''"/>
        <x-select label="批次" name="batch_id" :options="$batches" :selected="$data->batch_id??''"/>
        <x-select label="产品" name="product_id" :options="$products" :selected="$data->product_id??''"/>
        <x-select label="公司" name="company_id" :options="$companies" :selected="$data->company_id??''"/>
        @isset($data) @method('PUT') @endisset
      
        <x-submitbutton />
    </form>
</div>
   
@endsection