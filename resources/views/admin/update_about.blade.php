@extends('layouts.admin_master_tem')


@section('content')

<!-- Delete Client -->
<div id="delete_clients" class="col-md-12">
    <h3 class="text-center">
        Update About Us
    </h3>
    <div class="col-md-4">
        <h3 class="text-center">
            Armenian
        </h3>
        <form action="{{route('update_text')}}" method='post'>
            @if(session()->has('update_hy'))
            <div class="alert alert-success text-center">
                {{Session::get('update_hy')}}
            </div>
            @endif
            <textarea name="hy" class='form-control update_textarea' id="" >{{$abouts->text_hy}}</textarea>
            <button class='btn btn-success'>Update</button>
            {{ csrf_field() }}
        </form>
    </div>
    <div class="col-md-4">
        <h3 class="text-center">
            Russian
        </h3>
        <form action="{{route('update_text')}}" method='post'>
            @if(session()->has('update_ru'))
            <div class="alert alert-success text-center">
                {{Session::get('update_ru')}}
            </div>
            @endif
            <textarea name="ru" class='form-control update_textarea' id="" >{{$abouts->text_ru}}</textarea>
            <button class='btn btn-success'>Update</button>
            {{ csrf_field() }}
        </form>
    </div>
    <div class="col-md-4">
        <h3 class="text-center">
            English
        </h3>
        <form action="{{route('update_text')}}" method='post'>
            @if(session()->has('update_en'))
            <div class="alert alert-success text-center">
                {{Session::get('update_en')}}
            </div>
            @endif
            <textarea name="en" class='form-control update_textarea' id="" >{{$abouts->text_en}}</textarea>
            <button class='btn btn-success'>Update</button>
            {{ csrf_field() }}
        </form>
    </div>
</div> 


@endsection