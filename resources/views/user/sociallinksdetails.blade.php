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
    .violate .buttonn span {
        background: #9A3F96;
    }
    .pink .buttonn span {
        background: #f80c56;
    }
    .blue .buttonn span {
        background: #0044BA;
    }
    .green .buttonn span {
        background: #74B62E;
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
            

            <form class="mb-3 login-input" id="edit-all-form" action="{{ Route('edit-check-form') }}" method="POST">
                @csrf
                <input type="hidden" id="id" name="id" value="{{isset($card['id'])?$card['id']:''}}">
                
                <h3 class="head">SOCIAL LINKS</h3>
                <label for="text">Facebook</label>
                <input type="text" id="facebook" name="facebook" placeholder="Facebook url.." value="{{isset($card['facebook'])?$card['facebook']:''}}">
                <div class="help-block" id="error-facebook"></div>
                <label for="text">Twitter</label>
                <input type="text" id="twitter" name="twitter" placeholder="Twitter url.." value="{{isset($card['twitter'])?$card['twitter']:''}}">
                <div class="help-block" id="error-twitter"></div>
                <label for="text">Instagram</label>
                <input type="text" id="instagram" name="instagram" placeholder="Instagram url.." value="{{isset($card['instagram'])?$card['instagram']:''}}">
                <div class="help-block" id="error-instagram"></div>
                <label for="text">Pinterest</label>
                <input type="text" id="pinterest" name="pinterest" placeholder="Pinterest url.." value="{{isset($card['pinterest'])?$card['pinterest']:''}}">
                <div class="help-block" id="error-pinterest"></div>
                <label for="text">Linkedin</label>
                <input type="text" id="linkedin" name="linkedin" placeholder="Linkedin url.." value="{{isset($card['linkedin'])?$card['linkedin']:''}}">
                <div class="help-block" id="error-linkedin"></div>
                <label for="text">Youtube</label>
                <input type="text" id="youtube" name="youtube" placeholder="Youtube url.." value="{{isset($card['youtube'])?$card['youtube']:''}}">
                <div class="help-block" id="error-youtube"></div>
                <label for="text">Blogger</label>
                <input type="text" id="blogger" name="blogger" placeholder="Blogger url.." value="{{isset($card['blogger'])?$card['blogger']:''}}">
                <div class="help-block" id="error-blogger"></div>
                <label for="text">Snapchat</label>
                <input type="text" id="snapchat" name="snapchat" placeholder="Snapchat url.." value="{{isset($card['snapchat'])?$card['snapchat']:''}}">
                <div class="help-block" id="error-snapchat"></div>
                <label for="text">Telegram</label>
                <input type="text" id="telegram" name="telegram" placeholder="Telegram url.." value="{{isset($card['telegram'])?$card['telegram']:''}}">
                <div class="help-block" id="error-telegram"></div>
                <label for="text">Location and Google Link</label>
                <input type="text" id="location_and_google" name="location_and_google" placeholder="Location and Google Link.." value="{{isset($card['location_and_google'])?$card['location_and_google']:''}}">
                <div class="help-block" id="error-location_and_google"></div>
                
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