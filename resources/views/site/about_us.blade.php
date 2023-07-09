@extends('layouts.site_main')
@section('css')
<link href="{{ URL::asset('public/frontend/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('content')
 <div class="breadcrumbb">  
  <div class="container-fluid">
    <h2 class="breadcrumb-text">ABOUT US</h2>
  </div>
</div>
 <!--About-->
 
 <section class="about">
  <div class="container">
    <h2 class="aboutus-text">About Us</h2>
    <div class="row">
      <div class="col-sm-12 mb-5">
        <p class="aboutus-sub">{!! $about_us->content_body!=''?$about_us->content_body:'' !!}</p>
      </div>
    </div>
  </div>
</section> 
  
@stop
@section('js')
<script src="{{ URL::asset('public/frontend/js/owl.carousel.min.js') }}" type="text/javascript"></script>
@stop