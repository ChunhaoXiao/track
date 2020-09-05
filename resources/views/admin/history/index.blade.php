@extends('admin.layout')

@section('content_header')
    <h1>查询记录</h1>
@endsection

@section('content')
    <form class="form-inline" action="">
        <input type="text" class="form-control mb-2 ml-auto"  placeholder="防伪码" name="name" value="{{request()->name??''}}">
        <input type="text" class="form-control mb-2 ml-3"  placeholder="IP地址" name="brand" value="{{request()->brand??''}}">
        
        <button class="btn btn-secondary mb-2 ml-2">搜索</button>
    </form>

    <table class="table table-hover table-bordered">
        <thead>
            <th>防伪码</th>
            <th>产品信息</th>
            <th>查询时间</th>
            <th>ip</th>
        
            <th>操作</th>
        </thead>
        <tbody>
            @foreach($datas as $v)
                <tr>
                    <td>{{$v->code->security_code}}</td>
                    <td>{{$v->code->product->name}} ({{ $v->code->product->company->name??'' }})</td>
                    
                    <td>{{ $v->created_at }}</td>
                    <td>{{ $v->ip }}</td>
                    
                    <td>
                        
                        <a href="#" class="far fa-trash-alt text-secondary ml-3"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection