@extends('home.layout')

@section('content')
    <x-swiper :pictures="cache('setting')->swiper??[]"/>
        <div class="container">
            <form action="{{route('result')}}">
            <div class="row justify-content-center align-items-center no-gutters" style="height: 150px;">
                <div class="col-sm-2 mr-1"><input type="text" name="code" class="form-control"></div>
                <div class="col-sm-auto"><button class="btn btn-primary" type="submit">提交查询</button></div>
            </div>
            </form>
        </div>
@endsection