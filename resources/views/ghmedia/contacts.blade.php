@extends('layouts.master')


@section('title')
    Contacts
@endsection

@section('content')
    <div class="col-md-12">
        
        <div id="map" style="width:100%;height:500px"></div>
        <h1 class="text-center white">{{trans('home.Contacts')}}</h1>
        <div class="col-md-6">
            <div id="about_page_section">
                <h3 class='text-center white'>{{trans('home.location')}}</h3>
                    <p class='text-center white'>
                        {{trans('home.location_slug')}}
                    </p>
                    <p class='text-center white'>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                         {{trans('home.address')}}
                    </p>
                    <p class='text-center white'>
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                          ghmedia@gmail.com
                     </p>
                    <p class='text-center white'>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                          +37496111128
                    </p>
                    <p class='text-center white'>
                        <i class="fa fa-clock-o" aria-hidden="true"></i>  
                          09:00 - 19:00
                    </p>
            </div>
        </div>
        <div class="col-md-6">
           <h3 class='text-center white'>{{trans('home.send_sms')}}</h3>
            <form id='send_sms_form' action="/send_sms" method="post">
              @if(session()->has('send_sms'))
                  <div class="alert alert-success text-center">
                      {{Session::get('send_sms')}}
                  </div>
              @endif
              
               @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input class='form-control' type="text" placeholder="{{trans('home.name')}} *" name="name">
                <input class='form-control' type="text" placeholder="{{trans('home.email')}} *" name="email">
                <textarea class='form-control' name="sms" id="" placeholder="{{trans('home.sms')}} *" ></textarea>
                <button id='send_message'>{{trans('home.send')}}</button>
                {{ csrf_field() }}

            </form>
        </div>

    </div>
@endsection

<script>
function initMap() {
  var myLatLng = {lat: 40.363, lng: 44.044};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 5,
    center: myLatLng
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Hello World!'
  });
}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxGehsX-gT6CUsPsPGq0TXaqaLJcuE5Is&signed_in=true&callback=initMap" async defer>
    </script>