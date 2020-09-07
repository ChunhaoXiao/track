@extends('admin.layout')

@section('content_header')
    <h1>批次管理</h1>
@endsection

@section('content')
<div class="d-flex  justify-content-between pb-2">
    <div>
      <a href="{{ route('admin.batch.create')}}" class="btn btn-info">添加批次</a>
    </div>

    <!-- <form class="form-inline" action="">
     <input type="text" class="form-control mb-2 mr-sm-2"  placeholder="产品名称" name="name" value="{{request()->name??''}}">
     
     <button class="btn btn-secondary mb-2">搜索</button>
    </form> -->
    
    
</div>

    <table class="table table-hover table-bordered">
        <thead>
            <th>批次名称</th>
            <th>批次编号</th>
            
            <th>操作</th>
        </thead>
        <tbody>
            @foreach($datas as $v)
                <tr>
                
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->batch_number }}</td>
                    <td class="text-center">
                      <a href="{{route('admin.batch.edit', $v)}}" class="far fa-edit text-secondary"></a>
                      <a href="javascript:;" data-url="{{route('admin.batch.destroy', $v)}}" class="far fa-trash-alt text-secondary ml-3"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection