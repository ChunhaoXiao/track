@extends('admin.layout')

@section('content_header')
    <h1>系统设置</h1>
@endsection

@section('content')
<div class="container pt-2">
    <form action="{{route('admin.setting.store')}}" method="post" enctype="multipart/form-data">
        <x-textinput label="网站标题" name="title" :value="$data->title??''"/>
        <x-textinput label="正品时显示文字" name="real_text" :value="$data->real_text??''"/>
        <x-textinput label="赝品时显示文字" name="fake_text" :value="$data->fake_text??''"/>
        <x-textinput label="版权信息" name="copyright" :value="$data->copyright??''"/>
        <!-- <x-textinput label="logo" name="logo" type="file" :value="$data->logo"/>
         -->
        <div class="form-group row">
            <label class="col-form-label col-sm-1">logo</label>
            <div class="col-sm-6">
                <x-simpleuploader name="logo" single="1" :pictures="$data->logo??''" id="logo"/>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-form-label col-sm-1">幻灯片</label>
            <div class="col-sm-10">
               <!--  <x-jqueryupload id="album" name="swiper[]" :pictures="$data->swiper??[]"/> -->
                <x-simpleuploader :pictures="$data->swiper??[]" name="swiper" id="swiper" />
            </div>
        </div>
        <x-radio label="显示查询次数" :options="[1 => '是', 0 => '否']" name="enable_show_times" :checked="isset($data->enable_show_times) && $data->enable_show_times == 0? 0 : 1"/>
        <x-textinput label="查询间隔限制(秒)" name="frequency" type="number" :value="$data->frequency??''" placeholder="同一个ip两次查询最小间隔时间，单位：秒，0表示不限制" />    
        <x-radio label="是否开启查询" :options="[1 => '是', 0 => '否']" name="is_open" :checked="isset($data->is_open) && $data->is_open == 0? 0 : 1"/>
        <x-textarea text="ip黑名单" name="ip_blacklist" rows="5" placeholder="禁止访问的ip，多个ip之间用逗号，空格或者分号分隔。留空表示没有限制" labelcol="1" :value="$data->ip_blacklist??''"/>
        
       
        <x-submitbutton :tip="!empty(session('success'))?'操作成功':''"/>
       
    </form>
</div>
   
@endsection