@extends('admin.layout')

@section('content_header')
    <h1>修改密码</h1>
@endsection

@section('content')
<div class="container pt-2">
    <form action="{{ route('admin.password.update')}}" method="post">
        <x-textinput label="原密码" name="oldpass" type="password" />
        <x-textinput label="新密码" name="password" type="password" />
        <x-textinput label="确认密码" name="password_confirmation"  type="password"/>
        @method('PUT')
        <x-submitbutton />
    </form>
</div>
   
@endsection