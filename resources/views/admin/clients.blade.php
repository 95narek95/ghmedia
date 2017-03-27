@extends('layouts.admin_master_tem')
@section('content')
<!--            Clents Image form-->
<div id="add_clients" class="col-md-12">
    <div class="col-md-6 col-md-offset-3">
        <h3 class="text-center">
            Add Clents
        </h3>
        <h5 class="red">Recomended Image Size 300*150</h5>
        <form action="/gh-admin/add_clietns"  id="you_client_form" method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session()->has('client_success'))
            <div class="alert alert-success text-center">
                {{Session::get('client_success')}}
            </div>
            @endif
            @if(session()->has('client_error'))
            <div class="alert alert-danger text-center">
                {{Session::get('client_error')}}
            </div>
            @endif
            <input type="file" name="image" class="form-control">
            <button class="btn btn-success">Add</button>
            {{ csrf_field() }}

        </form>
    </div>
</div> 

@endsection