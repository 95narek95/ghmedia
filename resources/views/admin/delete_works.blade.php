@extends('layouts.admin_master_tem')


@section('content')

<!-- Delete Client -->
<div id="delete_clients" class="col-md-12">
    <div class="col-md-6 col-md-offset-3">
        <h3 class="text-center">
            Delete Clents
        </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Work Image</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
               @foreach($works as $work)
                <tr>
                    <td>{{$work->id}}</td>
                    <td><img class="img-thumbnail" src="{{URL::to('images_latest_works/'.$work->image)}}" alt=""></td>
                    <td><a href="{{route('delete_current_works',['id'=>$work->id]) }}" id="{{$work->id}}" class="btn btn-danger">Delete</a></td>
                </tr>
               @endforeach
                
            </tbody>
        </table>
        <div class="col-md-6 col-md-offset-3">{{ $works->links()  }}</div>
    </div>
</div> 


@endsection