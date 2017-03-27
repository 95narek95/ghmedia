@extends('layouts.admin_master_tem')

@section('content')
<div id="add_you_link" class="col-md-12">
    <div class="col-md-6 col-md-offset-3">
        <h3 class="text-center">
            Add Youtube Link & Image
        </h3>
        <form action="/gh-admin/add_you_link"  id="you_link_form" method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session()->has('link_success'))
            <div class="alert alert-success text-center">
                {{Session::get('link_success')}}
            </div>
            @endif
            @if(session()->has('link_error'))
            <div class="alert alert-danger text-center">
                {{Session::get('link_error')}}
            </div>
            @endif
            <input type="text" name="link" class="form-control" placeholder="Youtube Link">
            <input type="file" name="image" class="form-control">
            <button class="btn btn-success">Add</button>
            {{ csrf_field() }}

        </form>
    </div>
</div>
@endsection
