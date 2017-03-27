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
                    <th>Client Image</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
               @foreach($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td><img class="img-thumbnail" src="{{URL::to('images_clients/'.$client->image)}}" alt=""></td>
                    <td><a href="{{route('delete_current_client',['id'=>$client->id]) }}" id="{{$client->id}}" class="btn btn-danger">Delete</a></td>
                </tr>
               @endforeach
                
            </tbody>
        </table>
        <div class="col-md-6 col-md-offset-3">{{ $clients->links()  }}</div>
    </div>
</div> 


@endsection