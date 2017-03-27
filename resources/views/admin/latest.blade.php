@extends('layouts.admin_master_tem')
@section('content')

<!--            latest Work form-->
<div id="add_latest_work" class="col-md-12">
    <div class="col-md-6 col-md-offset-3">
        <h3 class="text-center">
            Add Latest Work
        </h3>
        <form action="/gh-admin/add_latest_work"  id="you_work_form" method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session()->has('work_success'))
            <div class="alert alert-success text-center">
                {{Session::get('work_success')}}
            </div>
            @endif
            @if(session()->has('work_error'))
            <div class="alert alert-danger text-center">
                {{Session::get('work_error')}}
            </div>
            @endif
            <input type="file" name="image" class="form-control">
            <button class="btn btn-success">Add</button>
            {{ csrf_field() }}

        </form>
    </div>
</div>
@endsection