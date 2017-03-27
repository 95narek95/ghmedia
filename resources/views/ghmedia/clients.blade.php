@extends('layouts.master')


@section('title')
    Clients
@endsection

@section('content')
<div id="clients_header" class="col-md-12 wrapper">
    <h1 id="our_clients_h1" class="text-center">{{trans('home.Clients')}}</h1>
    <div class="col-md-4 col-md-offset-4">
        <hr class="hr_color">
    </div>
    <div id="clients_wrapp" class="col-md-8 col-md-offset-2">
       @foreach($clients as $client)
        <div class="clients col-md-3">
            <img style="width:200px;height:100px" class='clients_img img-thumbnail ' src="{{URL::to('images_clients/'.$client->image)}}">
        </div>
        @endforeach
    </div>
</div>
<div class="col-md-6 text-center col-md-offset-3">  
    {{ $clients->links() }}
</div>
@endsection