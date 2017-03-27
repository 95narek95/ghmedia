@extends('layouts.master')

@section('title')
    Services
@endsection
@section('styles')
    <link rel="stylesheet" href="{{URL::to('css/lightbox.css')}}">
@endsection



@section('content')
    <div class="col-md-12 wrapper">
        
        <h1 class="text-center white col-md-12 h1_change">{{trans('home.ourwork')}}</h1>
        <div id="categories_ul" class="col-md-10 col-md-offset-1">
            <ul>
                <li class='white first_li'>{{trans('home.gallery')}} : </li>
                <li class='white categories_video' data-action='video'>{{trans('home.advertising')}}</li>
                <li class='white categories' data-action='1'>{{trans('home.GraphDesign')}}</li>
                <li class='white categories' data-action='2'>{{trans('home.ExteriorDesign')}}</li>
                <li class='white categories' data-action='3'>{{trans('home.InteriorDesign')}}</li>
                <li class='white categories' data-action='4'>{{trans('home.WebDesign')}}</li>
                <li class='white categories' data-action='5'>{{trans('home.Photosession')}}</li>
            </ul>
            <div id="items_imgs">
            @foreach($links as $link)
                <div class="col-md-4 add_items">
                    <div id="mydiv_{{$link->id}}" style="display:none;">
                      <div class="lightboxcontainer">
                          <iframe width="100%" height="400px" src="{{$link->link}}" frameborder="0" allowfullscreen></iframe>
                        <div style="clear:both;"></div>
                    </div>
                    </div>
                    <a href="#mydiv_{{$link->id}}" class="html5lightbox" data-width=800 data-height=600>
                       <div class="container1">
                        <img src="{{URL::to('/images_you_link/'.$link->image)}}" alt="">
                        <p></p>
                        <h1><i class="fa fa-play-circle" aria-hidden="true"></i></h1>
                        </div>
                    </a> 
                </div>
            @endforeach
            </div>
        </div>
        <div id="images_ajax" class="col-md-10 col-md-offset-1">
                
        </div>
    </div>
@endsection

   @section('scripts')
    <script src="{{URL::to('js/lightbox.js')}}"></script>
    <script src="{{URL::to('js/html5lightbox.js')}}"></script>
    <script src="{{URL::to('js/typed.js')}}"></script>
   @endsection
