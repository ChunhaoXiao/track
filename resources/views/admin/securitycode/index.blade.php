@extends('admin.layout')

@section('content_header')
    <h1>防伪码管理</h1>
@endsection

@section('content')
<p><a href="{{ route('admin.securitycode.create')}}" class="btn btn-info">添加防伪码</a></p>
    <table class="table table-hover table-bordered">
        <thead>
            <th>防伪码</th>
            <th>批次</th>
            <th>产品</th>
            <th>公司</th>
            <th>添加时间</th>
            <th>查询次数</th>
            <th>操作</th>
        </thead>
        <tbody>
            @foreach($datas as $v)
                <tr>
                    <td>{{$v->security_code}}</td>
                    <td>{{$v->batch->name }}</td>
                    <td>{{ $v->product->name }}</td>
                    <td>{{ $v->company->name }}</td>
                    <td>{{ $v->created_at }}</td>
                    <td>{{ $v->history_count }}</td>
                    <td> 
                      <a href="{{route('admin.securitycode.edit', $v)}}" class="far fa-edit text-secondary"></a>
                      <a href="#" class="far fa-trash-alt text-secondary ml-3"></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection