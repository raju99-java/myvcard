@extends('layouts.site_main')
@section('css')
<link href="{{ URL::asset('public/frontend/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('content')
<div class="breadcrumbb">  
  <div class="container-fluid">
    <h2 class="breadcrumb-text">PRICING</h2>
  </div>
</div>
<!--pricing-->
  <div class="container">
    <h2 class="pricing-title">The least and effective investment for your business</h2>
    <div class="row justify-content-center">
        <div class="pricing-bg mb-5">
            <div class="col-sm-12">
              <div class="card-body">
                <ul class="pricing-feature-list">
                  <li>{!! $pricing_description->content_body!=''?$pricing_description->content_body:'' !!}</li>
                  
                </ul>
                <div class="amount">
                  <div class="h1 pt-3">₹<span class="price font-weight-bolder">{{$subscription->value.'.00'}}</span></div>
                  <div class="purches-button"><a href="{{route('signup')}}">Purchase</a></div>
                </div>
              </div>
              
            </div>   
        </div>
      </div>
  </div>


@stop
@section('js')
<script src="{{ URL::asset('public/frontend/js/owl.carousel.min.js') }}" type="text/javascript"></script>
@stop  
