@extends('admin.layout')

@section('content_header')
    <h1>公司管理</h1>
@endsection

@section('content')
<p><a href="{{ route('admin.company.create')}}" class="btn btn-info">添加公司</a></p>
    <table class="table table-hover table-bordered">
        <thead>
            <th>公司名称</th>
            <th>公司logo</th>
            <th>公司地址</th>
            <th>联系电话</th>
            <th>网址</th>
            <th>操作</th>
        </thead>
        <tbody>
            @foreach($datas as $v)
                <tr>
                    <td>{{$v->name}}</td>
                    <td>@if($v->logo) <img src="{{asset('storage/'.$v->logo)}}" alt="" width="50" height="50"> @endif</td>
                    <td>{{ $v->address }}</td>
                    <td>{{ $v->phone }}</td>
                    <td>{{ $v->website }}</td>
                    <td>
                        <a href="{{route('admin.company.edit', $v)}}" class="far fa-edit text-secondary"></a>
                        <a href="javascript:;" data-url="{{route('admin.company.destroy', $v)}}" class="far fa-trash-alt text-secondary ml-3"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection