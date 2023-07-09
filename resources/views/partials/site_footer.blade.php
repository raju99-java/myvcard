@php
use App\Cms;
use App\Setting;
$logo=Cms::where('slug','=','logo')->first();
$footer_text=Cms::where('slug','=','footer_description')->first();
$copyright_text=Cms::where('slug','=','copyright_text')->first();
$facebook=Setting::where('slug','facebook_url')->first();
$twitter=Setting::where('slug','twitter_url')->first();
$instagram=Setting::where('slug','instagram_url')->first();
$youtube=Setting::where('slug','youtube_url')->first();
$google_play=Setting::where('slug','googleplaystore_url')->first();
@endphp
<div class="footer-wrapper">
    <div class="container-fluid">
        <div class="footer-mid-part">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="footer-section-one">
                        <div class="footer-heading"><img src="{{$logo->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$logo->content_body):URL::asset('public/images/logo-text.png')}}"></div>
                        <div class="about-text">
                            <p>{!! $footer_text->content_body !!}</p>
                        </div>
                      <div class="social-container mb-4 mt-2">
                        @if(isset($facebook->value) && $facebook->value!='')
                        <a href="{{$facebook->value}}" target="_blank" title="Facebook" class="facebook" style="box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);"><i class="fa fa-facebook-f"></i></a>
                        @endif
                        @if(isset($twitter->value) && $twitter->value!='')
                        <a href="{{$twitter->value}}" target="_blank" title="twitter" class="twitter" style="box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if(isset($instagram->value) && $instagram->value!='')
                        <a href="{{$instagram->value}}" target="_blank" title="Instagram" class="instagram" style="box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);"><i class="fa fa-instagram"></i></a>
                        @endif
                        
                        @if(isset($google_play->value) && $google_play->value!='')
                        <a href="{{$google_play->value}}"><img class="footer-google-play" src="{{URL::asset('public/site/image/googleplay.png')}}"></a>
                        @endif
                    </div>
                      	
                     
                      

                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <div class="footer-section-two">
                        <div class="footer-heading"><h5>Quick Links</h5></div>
                        <div class="footer-quick">
                            <ul>
                                <li><a href="{{route('/')}}">Home</a></li>
                                <li><a href="{{route('features')}}">Features</a></li>
                                <li><a href="{{route('how-it-works')}}">How it works</a></li>
                                <li><a href="{{route('pricing')}}">Pricing</a></li>
                                @if (Auth()->guard('frontend')->guest())
                                <li><a href="{{route('login')}}">login</a></li>
                                @else
                                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <div class="footer-section-two">
                        <div class="footer-heading"><h5>Information</h5></div>
                        <div class="footer-quick">
                            <ul>
                                <li><a href="{{route('about-us')}}">About Us</a></li>
                                <li><a href="{{route('contact')}}">Contact us</a></li>
                                <li><a href="{{route('franchises')}}">Franchise</a></li>
                                <li><a href="{{route('privacy_policy')}}">Privacy Policy</a></li>
                                <li><a href="{{route('terms_conditions')}}">Terms and Conditions</a></li>
                                <li><a href="{{route('return-refund-policy')}}">Return and Refund Policy</a></li>
                            </ul>
                        </div>
                    </div>

                </div><!--End of row-->
            </div><!--End of footer-mid-part-->   
        </div><!--End of container-fluid-->
    </div><!--end of footer-wrapper-->

    <div class="copy">
        <div class="row">
            <div class="col-sm col-xl">
                <div class="copy-right text-center">
                    <p>{!! $copyright_text->content_body !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>