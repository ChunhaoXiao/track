@extends('home.layout')

@section('content')
<div class="container pt-2" style="min-height: 700px;">
    <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">查询失败</h4>
    <p>没有找到相关产品</p>
    <hr>
    <p class="mb-0">确认你的输入是否正确</p>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-info w-100 text-white font-weight-bold" href="{{route('index')}}">重新查询</a>
        </div>
    </div>
</div>

@endsection