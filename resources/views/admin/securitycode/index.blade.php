@extends('admin.layout')

@section('content_header')
    <h1>防伪码管理</h1>
@endsection

@section('content')
<div class="d-flex  justify-content-between pb-2">
    <div>
    <a href="{{ route('admin.securitycode.create')}}" class="btn btn-info">添加防伪码</a>
    </div>
    

    <form class="form-inline" action="">
     <input type="text" class="form-control mb-2 mr-sm-2"  placeholder="防伪码" name="security_code" value="{{request()->security_code??''}}">
     <div class="mb-2 mr-sm-2">
       <x-select name="product_id" :options="$products" emptytext="产品" :selected="request()->product_id"/>
     </div>
     
     
     <button class="btn btn-secondary mb-2">搜索</button>
    </form>
</div>

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
    <p>{{$datas->withQueryString()->links()}}</p>
@endsection