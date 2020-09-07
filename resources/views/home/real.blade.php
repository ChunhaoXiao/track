@extends('home.layout')

@section('content')
    <div class="container">
        <x-swiper :pictures="$data->product->pictures??[]"/>

        <table class="table table-bordered mt-4">
            <tr>
                <td class="w-25 font-weight-bold">验证结果</td>
                <td>{{cache('setting')->real_text}}</td>
            </tr>
            <tr>
                <td class="w-25 font-weight-bold">防伪码</td>
                <td>{{$data->security_code}}</td>
            </tr>
            @if(cache('setting')->enable_show_times)
            <tr>
                <td class="w-25 font-weight-bold">查询次数</td>
                <td>{{$data->history_count}}</td>
            </tr>
            @endif
            <tr>
                <td class="w-25 font-weight-bold">最后一次查询时间</td>
                <td>{{$data->history()->latest()->value('created_at')}}</td>
            </tr>
        </table>
       
        <table class="table table-bordered rounded-top">
            <tr class="rounded-top bg-primary">
                <td colspan="2" class="font-weight-bold text-white">产品信息</td>
            </tr>
            <tr>
                <td class="w-25 font-weight-bold">产品名称</td>
                <td>{{$data->product->name}}</td>
            </tr>
            <tr>
                <td class="w-25 font-weight-bold">品牌</td>
                <td>{{$data->product->brand}}</td>
            </tr>
            @if($data->product->params)
            <tr>
                <td class="w-25 font-weight-bold">规格参数</td>
                <td>{{$data->product->params }}</td>
            </tr>
            @endif
            <tr>
                <td class="w-25 font-weight-bold">产品描述</td>
                <td>{{$data->product->description??''}}</td>
            </tr>
        </table>

        @if($data->product->company->id)
        <table class="table table-bordered rounded-top">
            <tr class="rounded-top bg-primary text-white">
                <td colspan="2" class="rounded-top font-weight-bold">企业信息</td>
            </tr>
            <tr>
                <td class="w-25 font-weight-bold">企业名称</td>
                <td>{{$data->product->company->name??''}}</td>
            </tr>
            <tr>
                <td class="w-25 font-weight-bold">地址</td>
                <td>{{$data->product->company->address??''}}</td>
            </tr>
            <tr>
                <td class="w-25 font-weight-bold">电话</td>
                <td>{{$data->product->company->phone??''}}</td>
            </tr>
            <tr>
                <td class="w-25 font-weight-bold">网址</td>
                <td>{{$data->product->company->website}}</td>
            </tr>
        </table>
        @endif
        <div class="row pb-3">
            <div class="col"><a href="{{route('index')}}" class="btn btn-info w-100 font-weight-bold">重新查询</a></div>
        </div>
    </div>
@endsection