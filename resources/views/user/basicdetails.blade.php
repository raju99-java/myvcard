@extends('layouts.main')
@section('css')
<link href="{{ URL::asset('public/frontend/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}

    input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=tel], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=email], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=url], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=file], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
    .buttonn{
        display: inline-block;
        position: relative;
        width: 50px;
        height: 50px;
        cursor: pointer;
        top: 1.4rem;
    }

    .buttonn span {
        display: block;
        position: realtive;
        top: 50%;
        left: 50%;
        border: 1px solid transparent;
        border-radius: 50% !important;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        color: #1d1d1f;
        cursor: pointer;
        float: left;
        padding: 3px;
        width: 40px;
        height: 40px;
        z-index: 1;
    }
    .colornav-container {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    

    .layer {
        display: inline-block;
        position: relative;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: transparent;
        z-index: -1;
    }


</style>
@stop
@section('content')
<section class="main-body-section">
    <div class="content-body">
        <?php
        if (Auth()->guard('frontend')->user()->payment_status == '1' && Auth()->guard('frontend')->user()->subscription_end >= Carbon\Carbon::now()->format('Y-m-d')) {
            ?>
        <div class="container-fluid mt-3">
            <h3 class="head">BUSINESS CARD DETAILS</h3>

            <form class="mb-3 login-input" id="edit-all-form" action="{{ Route('edit-check-form') }}" method="POST">
                @csrf
                <input type="hidden" id="id" name="id" value="{{isset($card['id'])?$card['id']:''}}">

                <label for="avatar">Choose your theme colour</label>
                <div class="colornav-container">
                    <!--first-6-->
                  <div class="first-six-color d-flex">
                    <div class="colornav-item violate">
                      <input type="radio" name="theme_color" value="1" {{($card['theme_color']=='1')?'checked':''}}>
                      <div class="buttonn"><span></span></div>
                    </div>
                
                    <div class="colornav-item pink">
                      <input type="radio" name="theme_color" value="2" {{($card['theme_color']=='2')?'checked':''}}>
                      <div class="buttonn"><span></span></div>
                    </div>
                
                    <div class="colornav-item blue">
                      <input type="radio" name="theme_color" value="3" {{($card['theme_color']=='3')?'checked':''}}>
                      <div class="buttonn"><span></span></div>
                    </div>
                
                    <div class="colornav-item green">
                      <input type="radio" name="theme_color" value="4" {{($card['theme_color']=='4')?'checked':''}}>
                      <div class="buttonn"><span></span></div>
                    </div>
                    <div class="colornav-item yellow">
                        <input type="radio" name="theme_color" value="5" {{($card['theme_color']=='5')?'checked':''}}>
                        <div class="buttonn"><span></span></div>
                      </div>
                      <div class="colornav-item sky">
                        <input type="radio" name="theme_color" value="6" {{($card['theme_color']=='6')?'checked':''}}>
                        <div class="buttonn"><span></span></div>
                      </div>
                  </div>    
                    <!--next-6-->
                  <div class="next-six-color d-flex">  
                    <div class="colornav-item red">
                        <input type="radio" name="theme_color" value="7" {{($card['theme_color']=='7')?'checked':''}}>
                        <div class="buttonn"><span></span></div>
                    </div>
                    <div class="colornav-item yellowish">
                        <input type="radio" name="theme_color" value="8" {{($card['theme_color']=='8')?'checked':''}}>
                        <div class="buttonn"><span></span></div>
                    </div>
                    <div class="colornav-item deepgrey">
                        <input type="radio" name="theme_color" value="9" {{($card['theme_color']=='9')?'checked':''}}>
                        <div class="buttonn"><span></span></div>
                    </div>
                    <div class="colornav-item orange">
                        <input type="radio" name="theme_color" value="10" {{($card['theme_color']=='10')?'checked':''}}>
                        <div class="buttonn"><span></span></div>
                    </div>
                    <div class="colornav-item black">
                        <input type="radio" name="theme_color" value="11" {{($card['theme_color']=='11')?'checked':''}}>
                        <div class="buttonn"><span></span></div>
                    </div>
                    <div class="colornav-item deepgreen">
                        <input type="radio" name="theme_color" value="12" {{($card['theme_color']=='12')?'checked':''}}>
                        <div class="buttonn"><span></span></div>
                    </div>
                 </div>   
                </div>

                <label for="avatar">Choose your profile picture</label>
                <input type="file" id="avatar" name="profile_picture" accept="image/png, image/jpeg">
                <div class="help-block" id="error-profile_picture"></div>

                <label for="fname">Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name Please.." value="{{isset($card['name'])?$card['name']:''}}">
                <div class="help-block" id="error-name"></div>

                <label for="position">Position</label>
                <input type="text" id="position" name="position" placeholder="Position.." value="{{isset($card['position'])?$card['position']:''}}">
                <div class="help-block" id="error-position"></div>

                <label for="phone">Phone Number(Enter without country code)</label>
                <input type="tel" id="phone" name="phone" placeholder="Phone Number.." value="{{isset($card['phone'])?$card['phone']:''}}">
                <div class="help-block" id="error-phone"></div>

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Email.." value="{{isset($card['email'])?$card['email']:''}}">
                <div class="help-block" id="error-email"></div>

                <label for="url">Website <span style="color:red;">(* Don't use http:// or https://)</span></label>
                <input type="text" name="website" id="website" placeholder="Website"  size="30"  value="{{isset($card['website'])?$card['website']:''}}">
                <div class="help-block" id="error-website"></div>

                <label for="phone">Whatsapp Number(Enter without country code)</label>
                <input type="tel" id="whatsapp_no" name="whatsapp_no" placeholder="Whatsapp No.." value="{{isset($card['whatsapp_no'])?$card['whatsapp_no']:''}}">
                <div class="help-block" id="error-whatsapp_no"></div>

                <label for="subject">Residential Address</label>
                <textarea id="residential_address" name="residential_address" placeholder="Residential Address.." style="height:80px">{{isset($card['residential_address'])?$card['residential_address']:''}}</textarea>
                <div class="help-block" id="error-residential_address"></div>

                
                <div class="submit-btn">
                    <input type="submit" value="Save">
                </div>  
            </form>
        </div>
    <?php } else { ?>
            <div class="col-lg-3 col-sm-6">
                <a href="{{route('pay')}}">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Subscription</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white"><i class="fa fa-inr" aria-hidden="true"></i> {{$subscription->value.'/-'}}</h2>
                                <p class="text-white mb-0">click here  for 1 year</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
        <!--container -->
    </div>
</section>
@stop
@section('js')
<script src="{{ URL::asset('public/frontend/js/owl.carousel.min.js') }}" type="text/javascript"></script>

@stop