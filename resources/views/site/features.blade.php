@extends('layouts.site_main')
@section('css')
<link href="{{ URL::asset('public/frontend/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('content')
<div class="breadcrumbb">  
  <div class="container-fluid">
    <h2 class="breadcrumb-text">FEATURES</h2>
  </div>
</div>
<!--feature image-->
  <div class="Arena">
    <div class="container">
        <!--<h2 class="arena-title">FEATURES</h2>-->
        <div class="row">
          <div class="col-sm-12">
              <div class="feature owl-theme">
                @forelse($features_owl as $i=> $fo)
                <div class="items text-center"><img src="{{URL::asset('public/uploads/feature/'.$fo->image)}}" alt="FeatureImage-{{$i+1}}"></div>
                @empty
                
                @endforelse
                <!--<div class="items text-center"><img src="{{URL::asset('public/site/image/Features Image 1.jpg')}}" alt="FeatureImage-1"></div>-->
                <!--<div class="items text-center"><img src="{{URL::asset('public/site/image/Features Image 2.jpg')}}" alt="FeatureImage-1"></div>-->
                <!--<div class="items text-center"><img src="{{URL::asset('public/site/image/Features Image 3.jpg')}}" alt="FeatureImage-1"></div>-->
                <!--<div class="items text-center"><img src="{{URL::asset('public/site/image/Features Image 4.jpg')}}" alt="FeatureImage-1"></div>-->
                <!--<div class="items text-center"><img src="{{URL::asset('public/site/image/Features Image 5.jpg')}}" alt="FeatureImage-5"></div>-->
                <!--<div class="items text-center"><img src="{{URL::asset('public/site/image/Features Image 6.jpg')}}" alt="FeatureImage-6"></div>-->
                <!--<div class="items text-center"><img src="{{URL::asset('public/site/image/Features Image 7.jpg')}}" alt="FeatureImage-7"></div>-->
                <!--<div class="items text-center"><img src="{{URL::asset('public/site/image/Features Image 8.jpg')}}" alt="FeatureImage-8"></div>-->
          </div>
        </div>
      </div>
    </div>
  </div> 
  <!--Feature image-->
<!--Why Digital Card-->
<div class="whyy-bg">
    <div class="container">
        <h2 class="why-title">Features</h2>
        <div class="row">
            <div class="col-sm-12">
                {!! $features->content_body!=''?$features->content_body:'' !!}
            </div>
        </div>
    </div>
</div> 
@stop
@section('js')
<script src="{{ URL::asset('public/frontend/js/owl.carousel.min.js') }}" type="text/javascript"></script>
@stop  