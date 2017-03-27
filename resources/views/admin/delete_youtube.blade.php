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
                    <th>Youtube Image</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
               @foreach($youtubes as $youtube)
                <tr>
                    <td>{{$youtube->id}}</td>
                    <td><img class="img-thumbnail" src="{{URL::to('images_you_link/'.$youtube->image)}}" alt=""></td>
                    <td><a href="{{route('delete_current_youtube',['id'=>$youtube->id]) }}" id="{{$youtube->id}}" class="btn btn-danger">Delete</a></td>
                </tr>
               @endforeach
                
            </tbody>
        </table>
        <div class="col-md-6 col-md-offset-3">{{ $youtubes->links()  }}</div>
    </div>
</div> 


@endsection