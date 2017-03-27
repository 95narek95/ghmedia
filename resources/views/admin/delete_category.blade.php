@extends('layouts.admin_master_tem')


@section('content')

<!-- Delete Client -->
<div id="delete_clients" class="col-md-12">
    <div class="col-md-6 col-md-offset-3">
        <h3 class="text-center">
            Delete Category Images
        </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category Image</th>
                    <th>Category Name</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
               @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><img class="img-thumbnail" src="{{URL::to('images_by_category/'.$category->image)}}" alt=""></td>
                    <td>{{$category->name}}</td>
                    <td><a href="{{route('delete_current_category',['id'=>$category->id]) }}" id="{{$category->id}}" class="btn btn-danger">Delete</a></td>
                </tr>
               @endforeach
                
            </tbody>
        </table>
        <div class="col-md-6 col-md-offset-3">{{ $categories->links()  }}</div>
    </div>
</div> 


@endsection