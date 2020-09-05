@extends('admin.layout')

@section('content_header')
    <h1>添加批次</h1>
@endsection

@section('content')
<div class="container pt-2">
    <form action="{{ isset($data)? route('admin.batch.update', $data) : route('admin.batch.store') }}" method="post">
        <x-textinput label="批次名称" name="name" :value="$data->name??''"/>
        <x-textinput label="批次编号" name="batch_number" :value="$data->batch_number??''"/>
       
        @isset($data) @method('PUT') @endisset
        <x-submitbutton />
    </form>
</div>
   
@endsection