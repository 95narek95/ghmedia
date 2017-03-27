@extends('layouts.admin_master_tem')


@section('content')
<!--            Add  Image By Category form-->
<div id="add_img_category" class="col-md-12">
    <div class="col-md-6 col-md-offset-3">
        <h3 class="text-center">
            Add Image By Category
        </h3>
        <h5 class="red">Recomended Image Size 1200*800</h5>
        <form action="/gh-admin/add_img_category"  id="you_category_form" method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session()->has('img_cat_success'))
            <div class="alert alert-success text-center">
                {{Session::get('img_cat_success')}}
            </div>
            @endif
            @if(session()->has('img_cat_error'))
            <div class="alert alert-danger text-center">
                {{Session::get('img_cat_error')}}
            </div>
            @endif
            <input type="file" name="image" class="form-control">
            <select class="form-control" name="category" id="">
                @foreach($categories as $category)
                <option value="{{$category->id}}" class="form-control">{{$category->name}}</option>
                @endforeach
            </select>
            <button class="btn btn-success">Add</button>
            {{ csrf_field() }}

        </form>
    </div>
</div>

@endsection