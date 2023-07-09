@extends('layouts.site_main')
@section('css')

<style>
iframe{
    width: 800px;
    height: 400px;
}

@media only screen and (max-width: 768px) {
    iframe{
        width: 300px;
        height: 150px;
    }
}

</style>

@stop
@section('content')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{$banner1->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$banner1->content_body):URL::asset('public/site/image/banner-one.jpg')}}" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{$banner2->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$banner2->content_body):URL::asset('public/site/image/banner-one.jpg')}}" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{$banner3->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$banner3->content_body):URL::asset('public/site/image/banner-one.jpg')}}" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

  <!--Buttons-->
  <!--<div class="container buttons">
      <div class="row">
          <div class="col-sm-6">
              <div class="log-in">
                 <a href="{{route('login')}}">LOGIN</a>
             </div>
          </div>
          <div class="col-sm-6">
            <div class="signup">
               <a href="{{route('signup')}}">SIGNUP</a>
            </div>  
          </div>
      </div>
  </div>-->

<div class="container buttons">
      <div class="row">
          <div class="col-sm-12 d-flex justify-content-center">
              <div class="log-in mr-3">
                 <a href="{{route('login')}}">LOGIN</a>
             </div>
             <div class="signup ml-3">
               <a href="{{route('signup')}}">SIGNUP</a>
            </div>  
          </div>
      </div>
  </div>


  <!--our valuable clients-->
   @if(isset($valuable_clients_image1->content_body) || isset($valuable_clients_image2->content_body) || isset($valuable_clients_image3->content_body) || isset($valuable_clients_image4->content_body) )
  <div class="container">
    <h2 class="our-client-title">RECENT CARDS</h2>
    <h6 class="arena-subtitle">Take a demo tour and create your own customized Digital Business Card</h6>
    <div class="row">
        
        <div class="owl-carousels owl-theme">
            
      <div class="col-sm-3">
        <div class="client justify-content-center">
            <a href="{{$valuable_clients_url1->content_body!=''?strip_tags($valuable_clients_url1->content_body):''}}"><img src="{{$valuable_clients_image1->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$valuable_clients_image1->content_body):''}}"  alt="..."></a>
        </div>
       </div>   

       <div class="col-sm-3">
        <div class="client justify-content-center">
          <a href="{{$valuable_clients_url2->content_body!=''?strip_tags($valuable_clients_url2->content_body):''}}"><img src="{{$valuable_clients_image2->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$valuable_clients_image2->content_body):''}}"  alt="..."></a>
        </div>
       </div>
       
       <div class="col-sm-3">
        <div class="client justify-content-center">
          <a href="{{$valuable_clients_url3->content_body!=''?strip_tags($valuable_clients_url3->content_body):''}}"><img src="{{$valuable_clients_image3->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$valuable_clients_image3->content_body):''}}"  alt="..."></a>
        </div>
       </div>

       <div class="col-sm-3 text-center">
        <div class="client justify-content-center">
          <a href="{{$valuable_clients_url4->content_body!=''?strip_tags($valuable_clients_url4->content_body):''}}"><img src="{{$valuable_clients_image4->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$valuable_clients_image4->content_body):''}}"  alt="..."></a>
        </div>
       </div>
      
       </div>
       
    </div>
  </div>
  @endif
<!--How It Work-->
<div class="container">
    
    <h2 class="arena-title">HOW IT WORKS</h2>
        <h6 class="arena-subtitle">The simplest way to show your profile</h6>
    <!--<h2 class="work-title">HOW IT WORKS</h2>-->
    <!--<h6 class="arena-subtitle">card arena.i.e  "the simplest way to show your details"</h6>-->
    <div class="row">
        <div class="col-sm-3 work-it">
            <div class="work-back">
                <div class="icon">
                    <p><i class="fa fa-user-o"></i></p>
                </div>
                <div class="icon-text">
                    <h5>Sign Up</h5>
                    <p>{!! $signup_text->content_body!=''?$signup_text->content_body:'' !!}</p>
                </div>
            </div>
        </div>   

        <div class="col-sm-3 work-it">
            <div class="work-back">
                <div class="icon">
                    <p><i class="fa fa-pencil-square-o"></i></p>
                </div>
                <div class="icon-text">
                    <h5>Create Card</h5>
                    <p>{!! $create_card_text->content_body!=''?$create_card_text->content_body:'' !!}</p>
                </div>
            </div>
        </div>

        <div class="col-sm-3 work-it">
            <div class="work-back">
                <div class="icon">
                    <p><i class="fa fa-share-alt" aria-hidden="true"></i></p>
                </div>
                <div class="icon-text">
                    <h5>Share Your Card</h5>
                    <p>{!! $share_your_card_text->content_body!=''?$share_your_card_text->content_body:'' !!}</p>
                </div>
            </div>
        </div>

        <div class="col-sm-3 work-it">
            <div class="work-back">
                <div class="icon">
                    <p><i class="fa fa-share-square-o" aria-hidden="true"></i></p>
                </div>
                <div class="icon-text">
                    <h5>Follow Up</h5>
                    <p>{!! $follow_Up_text->content_body!=''?$follow_Up_text->content_body:'' !!}</p>
                </div>
            </div>
        </div>
    </div>


</div>
<!--Card Arena-->
  <div class="Arena">
    <div class="container">
        <h2 class="arena-title">CARD DESIGNES</h2>
        <h6 class="arena-subtitle">Click on BUY NOW button to get your card now</h6>
        <div class="row">
          <div class="col-sm-12">
              <div class="owl-carousels owl-theme">
                @forelse($cardarenas as $cardarena)
                    <div class="item text-center"><img src="{{URL::asset('public/uploads/cardarena/'.$cardarena->image)}}" alt="card-1"><br/><a href="{{route('signup')}}">Buy Now</a></div>
                @empty
                <div class="item text-center"><img src="{{URL::asset('public/site/image/1.png')}}" alt="card-1"><br/><a href="{{route('signup')}}">Buy Now</a></div>
                <div class="item text-center"><img src="{{URL::asset('public/site/image/2.png')}}" alt="card-2"><br/><a href="{{route('signup')}}">Buy Now</a></div>
                <div class="item text-center"><img src="{{URL::asset('public/site/image/3.png')}}" alt="card-3"><br/><a href="{{route('signup')}}">Buy Now</a></div>
                <div class="item text-center"><img src="{{URL::asset('public/site/image/4.png')}}" alt="card-4"><br/><a href="{{route('signup')}}">Buy Now</a></div>
                <div class="item text-center"><img src="{{URL::asset('public/site/image/5.png')}}" alt="card-5"><br/><a href="{{route('signup')}}">Buy Now</a></div>
                <div class="item text-center"><img src="{{URL::asset('public/site/image/6.png')}}" alt="card-6"><br/><a href="{{route('signup')}}">Buy Now</a></div>
                @endforelse
                
          </div>
        </div>
      </div>
    </div>
  </div> 
  <!--Card Arena-->

<!--Why Digital Card-->
<div class="why-bg">
    <div class="container">
        <h2 class="why-title" style="color:#fff;">WHY MYVCARD.BUSINESS CARD</h2>
        <h5 class="" style="color:#fff;">Digital <b>MYVCARD.BUSINESS</b> for any industries</h5>
        <div class="row">
            <div class="col-sm-12" style="color:#fff;">
                {!! $why_digital_business_card_text->content_body!=''?$why_digital_business_card_text->content_body:'' !!}
            </div>
        </div>
    </div>
</div> 
<!---video--->
<!--<div class="container youtube-video">
  <div class="video-wrap">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/eIXNSZnLGlo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
</div>-->
@if($video_url_active->value==1)
<div class="container y-video">
    <iframe class="embed-responsive-item" src="{{ $video_url->content_body!=''?strip_tags($video_url->content_body):'https://www.youtube.com/embed/C0DPdy98e4c' }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
@endif
<!---countdown--->
<section class="countdown">
    <div class="container">
        <div class="row count-bg">
            <div class="col-sm-3">
                <div class="counter text-center">
                    <span>{!! $total_visitors->content_body!=''?$total_visitors->content_body:'100' !!}</span>
                    <h6>Total Visitors</h6>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="counter text-center">
                    <span>{!! $total_distributors->content_body!=''?$total_distributors->content_body:'100' !!}</span>
                    <h6>Total Distributors</h6>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="counter text-center">
                    <span>{!! $total_users->content_body!=''?$total_users->content_body:'100' !!}</span>
                    <h6>Total Users</h6>
                </div>
            </div>  

            <div class="col-sm-3">
                <div class="counter text-center">
                    <span>{!! $total_cards->content_body!=''?$total_cards->content_body:'100' !!}</span>
                    <h6>Total cards</h6>
                </div>
            </div>  

        </div>
    </div>
</section>
<!---end of countdown--->
<!--testimonial-->
<div class="testimonial-bg">
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="heading-title">TESTIMONIAL</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-offset-3 col-md-6">
                <div id="testimonial-slider" class="owl-carousel">
                    @forelse($testimonials as $testimonial)
                    <div class="testimonial">
                        <h3 class="testimonial-title">
                            {{$testimonial->name}}<small><br>{{$testimonial->company_name}}</small>
                        </h3>
                        <p class="description">{!! $testimonial->content !!}</p>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<div class="whyy-bg" style="background-color:#f6f6f6;padding-bottom:2rem;">
    <div class="container">
        <h2 class="why-title">TAGS</h2>
        <div class="row">
            <div class="col-sm-12">
                {!! $tags->content_body!=''?$tags->content_body:'Digital Card l Digital Business Card l Online Profile l Digital Visiting Card l Digital Profile l Company Digital Business Card l Student Digital Profile l Freelancer Digital Profile l Small Business Website l Online Digital Portal l Digital Card in Cheap Price l Student Resume l Professional Resume l Student Curriculum Vitae l Online Shop Details l Small Shop e-Commerce l Create Online Profile in Cheap Price' !!}
                
            </div>
        </div>
    </div>
</div> 

@stop
@section('js')
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174268383-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174268383-1');
</script>

@stop
