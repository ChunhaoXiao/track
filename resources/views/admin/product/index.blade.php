@extends('admin.layout')

@section('content_header')
    <h1>产品管理</h1>
@endsection

@section('content')
<div class="d-flex  justify-content-between pb-2">
    <div>
      <a href="{{ route('admin.product.create')}}" class="btn btn-info">添加产品</a>
    </div>

    <form class="form-inline" action="">
     <input type="text" class="form-control mb-2 mr-sm-2"  placeholder="产品名称" name="name" value="{{request()->name??''}}">
     <input type="text" class="form-control mb-2 mr-sm-2"  placeholder="品牌" name="brand" value="{{request()->brand??''}}">
     <select class="form-control mb-2 mr-sm-2" name="company">
         <option value="">所属公司</option>
         @foreach($companies as $k => $v)
            <option {{request()->company == $k?'selected':''}} value="{{$k}}">{{$v}}</option>
         @endforeach
    </select>
     <button class="btn btn-secondary mb-2">搜索</button>
    </form>
    
    
</div>

    <table class="table table-hover table-bordered">
        <thead>
            <th>产品名称</th>
            <th>产品品牌</th>
            <th>产品图片</th>
            <th class="w-25">产品规格(参数)</th>
            <th>所属公司</th>
            
            <th>操作</th>
        </thead>
        <tbody>
            @foreach($datas as $v)
                <tr>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->brand }}</td>
                    <td class="d-flex">

                        @foreach(array_slice($v->pictures??[], 0, 3) as $item )
                            <img class="mx-1 rounded" src="{{asset('storage/'.$item)}}" alt="" width="40" height="40">
                        @endforeach
                    </td>
                    <td>{{ Str::limit($v->params, 100) }}</td>
                    <td>{{ $v->company->name??''}}</td>
                    <td>
                      <a href="{{route('admin.product.edit', $v)}}" class="far fa-edit text-secondary"></a>
                      <a href="#" class="far fa-trash-alt text-secondary ml-3"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection