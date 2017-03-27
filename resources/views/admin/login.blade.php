@extends('layouts.admin_master')


@section('styles')
    <link rel="stylesheet" href="{{URL::to('admin/css/main.css')}} ">
@endsection

@section('content')
<div class="col-md-6 col-md-offset-3 wrapper">
   <h1 class="text-center h1_change"> Log In </h1>
   @if(session()->has('error_login'))
        <div class="alert alert-danger text-center">
            {{Session::get('error_login')}}
        </div>
    @endif
    <form id="login_form" action="/gh-admin/admin_login" method="post">
        <input type="text" name="login" class='form-control' placeholder='login'>
        <input type="password" name="password" class='form-control' placeholder='password'>
        <button id="login_btn" >Log In</button>
        {{ csrf_field() }}
    </form>
</div>
@endsection