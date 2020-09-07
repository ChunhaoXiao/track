@extends('admin.layout')

@section('content_header')
    <h4>数据统计</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm">
            <x-boarditem label="产品数量" :value="$product_count" bg="bg-info" :link="route('admin.product.index')" icon="fab fa-product-hunt"/>
        </div>
        <div class="col-sm">
            <x-boarditem label="批次" :value="$batch_count" bg="bg-success" :link="route('admin.batch.index')" icon="fas fa-layer-group"/>
        </div>
        <div class="col-sm">
            <x-boarditem label="防伪码" :value="$security_count" bg="bg-warning" :link="route('admin.securitycode.index')" icon="fas fa-barcode"/>
        </div>
        <div class="col-sm">
            <x-boarditem label="查询次数" :value="$query_count" bg="bg-danger" :link="route('admin.history.index')" icon="fas fa-history"/>
        </div>
       
    </div>
@endsection