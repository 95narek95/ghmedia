@extends('layouts.admin_master_tem')


@section('content')

<!-- Delete Client -->
<div id="update_sliders" class="col-md-12">
    <h3 class="text-center">
        Update Slider
    </h3>
    @foreach($sliders as $slider)
    <div class="col-md-4">
    <img src="{{URL::to('images_slider/'.$slider->image)}}" alt="" width="300px " height="100px">
    <form action="{{route('update_slider')}}" method="post" enctype="multipart/form-data"> 
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session()->has('update_'.$slider->id))
            <div class="alert alert-success text-center">
                {{Session::get('update_'.$slider->id)}}
            </div>
            @endif
        <input class="form-control" type="file" name="slide_{{$slider->id}}">
        <button class="btn btn-success">Update</button>
            {{ csrf_field() }}
    </form>
    </div>
    @endforeach
    @foreach($sliders as $slider)
    <div class="col-md-4">
        <h3 class="text-center">
            Armenian
        </h3>
        <form action="{{route('update_slider')}}" method='post'>
            @if(session()->has('update_hy_'.$slider->id))
            <div class="alert-success text-center">
                {{Session::get('update_hy_'.$slider->id)}}
            </div>
            @endif
            
            <textarea name="hy_{{$slider->id}}" class='form-control update_textarea' id="" >{{$slider->text_hy}}</textarea>
            <button class='btn btn-success'>Update</button>
            {{ csrf_field() }}
        </form>
    </div>
    <div class="col-md-4">
        <h3 class="text-center">
            Russian
        </h3>
        <form action="{{route('update_slider')}}" method='post'>
            @if(session()->has('update_ru_'.$slider->id))
            <div class="alert-success text-center">
                {{Session::get('update_ru_'.$slider->id)}}
            </div>
            @endif
            <textarea name="ru_{{$slider->id}}" class='form-control update_textarea' id="" >{{$slider->text_ru}}</textarea>
            <button class='btn btn-success'>Update</button>
            {{ csrf_field() }}
        </form>
    </div>
    <div class="col-md-4">
        <h3 class="text-center">
            English
        </h3>
        <form action="{{route('update_slider')}}" method='post'>
            @if(session()->has('update_en_'.$slider->id))
            <div class="alert-success text-center">
                {{Session::get('update_en_'.$slider->id)}}
            </div>
            @endif
            <textarea name="en_{{$slider->id}}" class='form-control update_textarea' id="" >{{$slider->text_en}}</textarea>
            <button class='btn btn-success'>Update</button>
            {{ csrf_field() }}
        </form>
    </div>
    @endforeach
</div> 


@endsection