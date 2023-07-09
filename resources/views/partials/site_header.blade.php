@php
use App\Cms;
$logo=Cms::where('slug','=','logo')->first();
$banner1=Cms::where('slug','=','slider1')->first();
$banner2=Cms::where('slug','=','slider2')->first();
$banner3=Cms::where('slug','=','slider3')->first();
@endphp
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('/')}}"><img src="{{$logo->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$logo->content_body):URL::asset('public/images/logo-text.png')}}" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="slide-collapse" data-target="#slide-navbar-collapse" aria-controls="slide-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="slide-navbar-collapse">
            <a href="javascript:void(0);" class="closebtn" onclick="closeNav();" id="colsenav">×</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" href="{{route('about-us')}}">About us</a>-->
                <!--</li>-->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('features')}}">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('how-it-works')}}">How it works</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('pricing')}}">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('franchises')}}">Franchise</a>
                </li>
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" href="{{route('contact')}}">Contact Us</a>-->
                <!--</li>-->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void();" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     LANGUAGE
                </a>
                <div class="dropdown-menu scrollable-menu" aria-labelledby="navbarDropdown">
                  <a href="javascript:void();" onclick="doGTranslate('hi|en');return false;" title="English" class="dropdown-item glink nturl notranslate">ENGLISH</a>
                  <a href="javascript:void();" onclick="doGTranslate('en|hi');return false;" title="Hindi" class="dropdown-item glink nturl notranslate">HINDI</a>
                  <a href="javascript:void();" onclick="doGTranslate('en|bn');return false;" title="BENGALI" class="dropdown-item glink nturl notranslate">BENGALI</a>
                  <a href="javascript:void();" onclick="doGTranslate('ur|mr');return false;" title="MARATHI" class="dropdown-item glink nturl notranslate">MARATHI</a>
                  <a href="javascript:void();" onclick="doGTranslate('en|te');return false;" title="TELEGU" class="dropdown-item glink nturl notranslate">TELUGU</a>
                  <a href="javascript:void();" onclick="doGTranslate('en|ta');return false;" title="TAMIL" class="dropdown-item glink nturl notranslate">TAMIL</a>
                  <a href="javascript:void();" onclick="doGTranslate('ur|ur');return false;" title="URDU" class="dropdown-item glink nturl notranslate">URDU</a>
                  <a href="javascript:void();" onclick="doGTranslate('en|gu');return false;" title="GUJARATI" class="dropdown-item glink nturl notranslate">GUJARATI</a>
                  <a href="javascript:void();" onclick="doGTranslate('en|kn');return false;" title="KANNADA" class="dropdown-item glink nturl notranslate">KANNADA</a>
                  <a href="javascript:void();" onclick="doGTranslate('ur|ml');return false;" title="MALAYALAM" class="dropdown-item glink nturl notranslate">MALAYALAM</a>
                  <a href="javascript:void();" onclick="doGTranslate('en|or');return false;" title="ODIA" class="dropdown-item glink nturl notranslate">ODIA</a>
                  <a href="javascript:void();" onclick="doGTranslate('en|pa');return false;" title="PUNJABI" class="dropdown-item glink nturl notranslate">PUNJABI</a>
                  
                 </div>
               </li>
            </ul>
          
            <div class="click">
                @if (Auth()->guard('frontend')->guest())
                <div class="login mr-2">
                    <a href="{{route('login')}}">login</a>
                </div>
                <div class="Register">
                    <a href="{{route('signup')}}">SignUp</a>
                </div>
                @else
                <div class="Register">
                    <a href="{{route('dashboard')}}">Dashboard</a>
                </div>       
                @endif
            </div>

        </div>
    </div>
</nav>
<!--banner-->
