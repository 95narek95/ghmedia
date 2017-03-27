@extends('layouts.master')


@section('title')
    GhmediaGroup
@endsection

@section('styles')
    <link rel="stylesheet" href="{{URL::to('css/slider.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/item.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/jquery.bxslider.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/lightbox.css')}}">
@endsection

@section('content')

<!--SLIDER START-->
<div id="slider_main">
 <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="6000" id="bs-carousel">
  <!-- Overlay -->
  <div class="overlay"></div>

<!--   Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#bs-carousel" data-slide-to="1"></li>
    <li data-target="#bs-carousel" data-slide-to="2"></li>
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    @foreach($sliders as $slider)
    @if($slider->id == 1)
        <div class="item slides active">
    @else
    <div class="item slides">
    @endif
      <div class="slide-1">
          <img src="{{URL::to('images_slider/'.$slider->image)}}" alt="">
      </div>
      <div class="hero">
       @if(App::getlocale() == 'hy')
       <hgroup>
            <h1>{{$slider->text_hy}}</h1>        
        </hgroup>
       @endif
       @if(App::getlocale() == 'en')
       <hgroup>
            <h1>{{$slider->text_en}}</h1>        
        </hgroup>
       @endif
       @if(App::getlocale() == 'ru')
       <hgroup>
            <h1>{{$slider->text_ru}}</h1>        
        </hgroup>
       @endif
        
      </div>
    </div>
    @endforeach
  </div> 
</div>
</div>

<!--SLDER END-->

<!--START ITEM SLIDER 1 -->
<div id="latest_work">
<div class="container">
  <h1 class="text-center h1_change">{{trans('home.latestwork')}}</h1>
  <div class="row">
    <div class="col-md-12">
      <div class="carousel slide multi-item-carousel" id="theCarousel">
       <div id="example">
        <div class="carousel-inner">
          @foreach($works as $work)
          @if($work->id == 1)
          <div class="item active">
          @else
            <div class="item">
          @endif 
            <div class="col-xs-4 item_latest">
                <a href="{{URL::to('/images_latest_works/'.$work->image)}}" data-lightbox="image-1">
                    <img src="{{URL::to('/images_latest_works/'.$work->image)}}" class="img-responsive">
                </a>
            </div>
          </div>
          @endforeach
        </div>
        <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
        <a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
      </div>
      </div>
    </div>
  </div>
</div>
</div>

<!--END ITEM SLIDER 1 -->

<!--START ABOUT US SECTION-->

<div id="about_us" class="col-md-12">
    <h1 class="text-center h1_change">{{trans('home.AboutUs')}}</h1>
    <h4 class="text-center about_text element"></h4>    
</div>

<!--END ABOUT US SECTION-->

<!--START ITEM SLIDER 2 -->
<div id="clients_div" class="col-md-12">
    <h1 class="text-center h1_change">{{trans('home.Clients')}}</h1>
    <div class="slider1">
      @foreach($clients as $client)
          <div class="slide"><img style="width:300px;height:150px" src="{{ URL::to('images_clients/'.$client->image) }}"></div>
      @endforeach
      
      
    </div>
</div>
<!--END ITEM SLIDER 2 -->

@endsection

@section('scripts')
    <script src="{{URL::to('js/jquery.bxslider.js')}}"></script>
    <script src="{{URL::to('js/item_slider.js')}}"></script>
    <script src="{{URL::to('js/lightbox.js')}}"></script>
    <script src="{{URL::to('js/typed.js')}}"></script>
@endsection

